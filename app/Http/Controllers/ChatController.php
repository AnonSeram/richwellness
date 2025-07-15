<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Faq;
use Illuminate\Support\Facades\Auth;
use App\Services\DialogflowService;
use App\Services\ChatbotService;
use LanguageDetector\LanguageDetector;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    protected $dialogflowService;
    protected $chatbotService;
    protected $detectedLanguage;

    public function __construct(DialogflowService $dialogflowService, ChatbotService $chatbotService)
    {
        $this->dialogflowService = $dialogflowService;
        $this->chatbotService = $chatbotService;
    }

    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000' // Batasi panjang pesan
        ]);

        // Sanitasi input untuk mencegah XSS dan injection
        $userMessage = $this->sanitizeInput($request->message);
        
        // Cek apakah input mengandung kode berbahaya
        if ($this->containsMaliciousCode($userMessage)) {
            Log::warning('Malicious code detected in chat input:', ['message' => $request->message]);
            return response()->json([
                'success' => false,
                'response' => 'Maaf, pesan Anda mengandung konten yang tidak diizinkan. Silakan kirim pesan yang lebih sederhana.',
                'history' => $this->getChatHistory(),
                'language' => $this->detectedLanguage ?? 'id'
            ]);
        }

        $userMessage = $request->message;
        Log::info('Processing new message:', ['message' => $userMessage]);

        // Deteksi bahasa
        $this->detectedLanguage = $this->detectLanguage($userMessage);
        Log::info('Detected language:', ['language' => $this->detectedLanguage]);

        // Cek perubahan bahasa
        $previousLanguage = Session::get('user_language', 'id');
        $languageChanged = $previousLanguage !== $this->detectedLanguage;
        
        // Simpan bahasa yang terdeteksi
        Session::put('user_language', $this->detectedLanguage);

        // Simpan pesan user
        $userChat = Chat::create([
            'user_id' => Auth::check() ? Auth::id() : null,
            'message' => $userMessage,
            'is_bot' => false,
            'language' => $this->detectedLanguage
        ]);

        // Jika ada perubahan bahasa, tambahkan pesan notice
        if ($languageChanged) {
            $languageNotice = $this->getLanguageChangeNotice($this->detectedLanguage);
            Chat::create([
                'user_id' => Auth::check() ? Auth::id() : null,
                'message' => $languageNotice,
                'is_bot' => true,
                'language' => $this->detectedLanguage
            ]);
        }

        // Deteksi sapaan (greetings) sebelum ke FAQ/Dialogflow
        $greetings = ['halo', 'hallo', 'hi', 'hello', 'hai', 'selamat pagi', 'selamat siang', 'selamat sore', 'selamat malam'];
        if (in_array(strtolower(trim($userMessage)), $greetings)) {
            $response = $this->detectedLanguage === 'en'
                ? 'Hello! I am RichBot, virtual assistant from Rich Wellness. How can I help you?'
                : 'Halo! Saya RichBot, asisten virtual dari Rich Wellness. Ada yang bisa saya bantu?';
            $quickReplies = $this->getQuickReplies($userMessage, $this->detectedLanguage);
            // Simpan jawaban bot
            $botChat = Chat::create([
                'user_id' => Auth::check() ? Auth::id() : null,
                'message' => $response,
                'is_bot' => true,
                'language' => $this->detectedLanguage
            ]);
            // Ambil history chat
            $history = $this->getChatHistory();
            return response()->json([
                'success' => true,
                'response' => $response,
                'history' => $history,
                'quickReplies' => $quickReplies,
                'language' => $this->detectedLanguage,
                'languageChanged' => $languageChanged
            ]);
        }

        // Cek FAQ dengan Fuzzy Search
        Log::info('Checking FAQ with fuzzy search');
        $faqMatch = $this->findBestMatch($userMessage, $this->detectedLanguage);
        
        if ($faqMatch) {
            Log::info('Found FAQ match:', [
                'question' => $faqMatch->question,
                'answer' => $faqMatch->answer,
                'score' => $faqMatch->score ?? 'N/A'
            ]);
            
            $response = $faqMatch->answer;
            $quickReplies = $this->getQuickReplies($faqMatch->question, $this->detectedLanguage);
        } else {
            // Jika tidak ada di FAQ, cek Dialogflow
            Log::info('No FAQ match found, checking Dialogflow');
            $sessionId = Session::getId();
            $dialogflowResponse = $this->dialogflowService->detectIntent($userMessage, $this->detectedLanguage, $sessionId);
            
            // Cek apakah intent terdeteksi dan adalah cek_kamar atau cek-kamar
            if ($dialogflowResponse['success'] && isset($dialogflowResponse['intent']) && 
                ($dialogflowResponse['intent'] === 'cek_kamar' || $dialogflowResponse['intent'] === 'cek-kamar')) {
                
                // Cek apakah ini pertanyaan tentang pemesanan, bukan ketersediaan
                $pemesananKeywords = ['pesan', 'booking', 'reservasi', 'cara', 'bagaimana', 'proses', 'order', 'daftar'];
                $isPemesananQuestion = false;
                foreach ($pemesananKeywords as $keyword) {
                    if (stripos($userMessage, $keyword) !== false) {
                        $isPemesananQuestion = true;
                        break;
                    }
                }
                
                // Cek apakah ini pertanyaan yang membutuhkan kedua informasi (ketersediaan + pemesanan)
                $ketersediaanKeywords = ['kosong', 'tersedia', 'ada', 'berapa', 'jumlah'];
                $hasKetersediaanQuestion = false;
                foreach ($ketersediaanKeywords as $keyword) {
                    if (stripos($userMessage, $keyword) !== false) {
                        $hasKetersediaanQuestion = true;
                        break;
                    }
                }
                
                if ($isPemesananQuestion && $hasKetersediaanQuestion) {
                    Log::info('Intent cek_kamar but combined question detected (availability + booking), providing both information');
                    $response = $this->getKamarDanPemesananInfo($this->detectedLanguage);
                    $quickReplies = $this->getQuickReplies($userMessage, $this->detectedLanguage);
                } elseif ($isPemesananQuestion) {
                    Log::info('Intent cek_kamar but pemesanan question detected, providing booking information');
                    $response = $this->getPemesananInfo($this->detectedLanguage);
                    $quickReplies = $this->getQuickReplies($userMessage, $this->detectedLanguage);
                } else {
                    Log::info('Intent cek_kamar detected, getting room data from database');
                    $response = $this->chatbotService->getKamarData($this->detectedLanguage);
                    $quickReplies = $this->getQuickReplies($userMessage, $this->detectedLanguage);
                }
                
                Log::info('Response generated:', ['response' => $response]);
            } elseif (!empty($dialogflowResponse['fulfillment_text'])) {
                Log::info('Found Dialogflow response:', [
                    'fulfillment_text' => $dialogflowResponse['fulfillment_text'],
                    'language' => $this->detectedLanguage
                ]);
                
                $response = $dialogflowResponse['fulfillment_text'];
                $quickReplies = $this->getQuickReplies($userMessage, $this->detectedLanguage);
            } else {
                Log::info('No Dialogflow response found');
                
                // Fallback: cek apakah pesan mengandung kata kunci kamar
                $kamarKeywords = ['kamar', 'kosong', 'tersedia', 'jumlah', 'berapa', 'ada'];
                $containsKamarKeyword = false;
                foreach ($kamarKeywords as $keyword) {
                    if (stripos($userMessage, $keyword) !== false) {
                        $containsKamarKeyword = true;
                        break;
                    }
                }
                
                if ($containsKamarKeyword) {
                    // Cek apakah ini pertanyaan tentang pemesanan, bukan ketersediaan
                    $pemesananKeywords = ['pesan', 'booking', 'reservasi', 'cara', 'bagaimana', 'proses', 'order', 'daftar'];
                    $isPemesananQuestion = false;
                    foreach ($pemesananKeywords as $keyword) {
                        if (stripos($userMessage, $keyword) !== false) {
                            $isPemesananQuestion = true;
                            break;
                        }
                    }
                    
                                    // Cek apakah ini pertanyaan yang membutuhkan kedua informasi (ketersediaan + pemesanan)
                $ketersediaanKeywords = ['kosong', 'tersedia', 'ada', 'berapa', 'jumlah'];
                $hasKetersediaanQuestion = false;
                foreach ($ketersediaanKeywords as $keyword) {
                    if (stripos($userMessage, $keyword) !== false) {
                        $hasKetersediaanQuestion = true;
                        break;
                    }
                }
                
                if ($isPemesananQuestion && $hasKetersediaanQuestion) {
                    Log::info('Combined question detected (availability + booking), providing both information');
                    $response = $this->getKamarDanPemesananInfo($this->detectedLanguage);
                    $quickReplies = $this->getQuickReplies($userMessage, $this->detectedLanguage);
                } elseif ($isPemesananQuestion) {
                    Log::info('Pemesanan question detected, providing booking information');
                    $response = $this->getPemesananInfo($this->detectedLanguage);
                    $quickReplies = $this->getQuickReplies($userMessage, $this->detectedLanguage);
                } else {
                    Log::info('Kamar availability question detected, getting room data from database');
                    $response = $this->chatbotService->getKamarData($this->detectedLanguage);
                    $quickReplies = $this->getQuickReplies($userMessage, $this->detectedLanguage);
                }
                } else {
                $response = $this->getDefaultResponse($this->detectedLanguage);
                $quickReplies = $this->getQuickReplies($userMessage, $this->detectedLanguage);
                }
            }
        }

        // Simpan jawaban bot
        $botChat = Chat::create([
            'user_id' => Auth::check() ? Auth::id() : null,
            'message' => $response,
            'is_bot' => true,
            'language' => $this->detectedLanguage
        ]);

        // Ambil history chat
        $history = $this->getChatHistory();

        return response()->json([
            'success' => true,
            'response' => $response,
            'history' => $history,
            'quickReplies' => $quickReplies,
            'language' => $this->detectedLanguage,
            'languageChanged' => $languageChanged
        ]);
    }

    public function index()
    {
        // Reset bahasa user saat memulai chat baru
        Session::forget('user_language');
        
        $welcomeMessage = $this->getWelcomeMessage('id'); // Default ke bahasa Indonesia

        // Simpan welcome message ke history chat
        Chat::create([
            'user_id' => Auth::check() ? Auth::id() : null,
            'message' => $welcomeMessage,
            'is_bot' => true,
            'language' => 'id'
        ]);

        return view('chat');
    }

    private function detectLanguage($text)
    {
        // Implementasi sederhana deteksi bahasa
        $englishWords = ['available','room','hallo','do', 'did', 'what', 'how', 'the', 'is', 'and', 'of', 'to', 'in', 'that', 'have', 'for', 'not', 'with', 'you', 'this', 'but', 'his', 'from', 'they', 'say', 'her', 'she'];
        $indonesianWords = [ 'tersedia','kamar','halo','apa', 'bagaimana', 'yang', 'dan', 'di', 'ke', 'dari', 'ini', 'itu', 'dengan', 'untuk', 'tidak', 'akan', 'ada', 'dalam', 'bisa', 'saya', 'kamu', 'mereka', 'kita', 'sudah', 'bisa'];
        
        $text = strtolower($text);
        $words = str_word_count($text, 1);
        
        $englishCount = 0;
        $indonesianCount = 0;
        
        foreach ($words as $word) {
            if (in_array($word, $englishWords)) {
                $englishCount++;
            }
            if (in_array($word, $indonesianWords)) {
                $indonesianCount++;
            }
        }
        
        return $englishCount > $indonesianCount ? 'en' : 'id';
    }


    private function getDefaultResponse($lang)
    {
        return $lang === 'en' 
            ? "Sorry for the inconvenience, Richbot can't answer your question."
            : "Mohon maaf atas keidaknyamanan-nya, Richbot belum bisa menjawab pertanyaan Anda.";
    }

    private function findBestMatch($message, $lang)
    {
        $faqs = Faq::where('language', $lang)->get();

        $message = strtolower($message);
        $bestMatch = null;
        $highestScore = 0;

        foreach ($faqs as $faq) {
            similar_text($message, strtolower($faq->question), $percent);
            if ($percent > $highestScore) {
                $highestScore = $percent;
                $bestMatch = $faq;
            }
        }

        Log::info('Fuzzy Search Score:', [
            'message' => $message,
            'best_match' => $bestMatch ? $bestMatch->question : null,
            'score' => $highestScore
        ]);

        // Meningkatkan threshold menjadi 80% untuk mengurangi false positive
        return $highestScore >= 80 ? $bestMatch : null;
    }


    private function getChatHistory()
    {
        return Chat::where('user_id', Auth::check() ? Auth::id() : null)
                  ->orderBy('created_at', 'desc')
                  ->take(10)
                  ->get()
                  ->reverse()
                  ->values();
    }

    private function getLanguageChangeNotice($newLanguage)
    {
        if ($newLanguage === 'en') {
            return "I noticed you're speaking English, switching to English from now on";
        }
        return "Saya mendeteksi Anda menggunakan Bahasa Indonesia, mengubah bahasa sekarang";
    }

    private function getQuickReplies($message, $lang)
    {
        if ($lang === 'en') {
            return [
                'What services are available?',
                'Check room availability',
                'Where is Rich Wellness located?'
            ];
        }
        return [
            'Apa saja layanan yang tersedia?',
            'Cek ketersediaan kamar',
            'Dimana lokasi Rich Wellness?'
        ];
    }

    public function changeLanguage(Request $request)
    {
        $lang = $request->input('language', 'id');
        Session::put('user_language', $lang);
        return response()->json(['success' => true, 'language' => $lang]);
    }

    private function getPemesananInfo($lang)
    {
        if ($lang === 'en') {
            return "To make a room reservation at Rich Wellness, you can:\n\n" .
                   "1. Visit our website and use the online booking system\n" .
                   "2. Call us directly at our reservation hotline\n" .
                   "3. Visit our reception for in-person booking\n\n" .
                   "For online booking, please visit our website and fill out the reservation form with your details including:\n" .
                   "• Guest name and contact information\n" .
                   "• Room type preference\n" .
                   "• Check-in and check-out dates\n" .
                   "• Number of rooms needed\n\n" .
                   "Our staff will process your reservation and confirm the booking details.";
        } else {
            return "Untuk melakukan pemesanan kamar di Rich Wellness, Anda dapat:\n\n" .
                   "1. Mengunjungi website kami dan menggunakan sistem pemesanan online\n" .
                   "2. Menghubungi kami langsung melalui hotline reservasi\n" .
                   "3. Mengunjungi resepsionis untuk pemesanan langsung\n\n" .
                   "Untuk pemesanan online, silakan kunjungi website kami dan isi formulir reservasi dengan detail Anda termasuk:\n" .
                   "• Nama tamu dan informasi kontak\n" .
                   "• Preferensi tipe kamar\n" .
                   "• Tanggal check-in dan check-out\n" .
                   "• Jumlah kamar yang dibutuhkan\n\n" .
                   "Staff kami akan memproses reservasi Anda dan mengkonfirmasi detail pemesanan.";
        }
    }

    private function getKamarDanPemesananInfo($lang)
    {
        // Ambil data ketersediaan kamar
        $kamarInfo = $this->chatbotService->getKamarData($lang);
        
        // Ambil informasi pemesanan
        $pemesananInfo = $this->getPemesananInfo($lang);
        
        if ($lang === 'en') {
            return $kamarInfo . "\n\n" . $pemesananInfo;
        } else {
            return $kamarInfo . "\n\n" . $pemesananInfo;
        }
    }

    /**
     * Sanitasi input untuk mencegah XSS dan injection
     */
    private function sanitizeInput($input)
    {
        // Hapus karakter berbahaya
        $input = strip_tags($input);
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        
        // Hapus karakter kontrol yang tidak diizinkan
        $input = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/', '', $input);
        
        // Trim whitespace
        $input = trim($input);
        
        return $input;
    }

    /**
     * Deteksi kode berbahaya dalam input
     */
    private function containsMaliciousCode($input)
    {
        $lowerInput = strtolower($input);
        
        // Pattern untuk mendeteksi HTML/JavaScript
        $htmlPatterns = [
            '/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/i',
            '/<iframe\b[^<]*(?:(?!<\/iframe>)<[^<]*)*<\/iframe>/i',
            '/<object\b[^<]*(?:(?!<\/object>)<[^<]*)*<\/object>/i',
            '/<embed\b[^<]*>/i',
            '/javascript:/i',
            '/on\w+\s*=/i', // onclick, onload, etc.
            '/<img\b[^<]*on\w+\s*=/i',
            '/<a\b[^<]*on\w+\s*=/i'
        ];
        
        // Pattern untuk mendeteksi SQL injection
        $sqlPatterns = [
            '/\b(union|select|insert|update|delete|drop|create|alter|exec|execute)\b/i',
            '/\b(or|and)\s+\d+\s*=\s*\d+/i',
            '/\b(or|and)\s+\'[^\']*\'\s*=\s*\'[^\']*\'/i',
            '/\b(or|and)\s+1\s*=\s*1/i',
            '/\b(or|and)\s+1\s*=\s*2/i',
            '/\b(or|and)\s+\'[^\']*\'\s*=\s*\'[^\']*\'/i',
            '/\b(or|and)\s+\d+\s*=\s*\d+/i'
        ];
        
        // Pattern untuk mendeteksi command injection
        $commandPatterns = [
            '/\b(cat|ls|pwd|whoami|id|uname|ps|netstat|ifconfig|ipconfig)\b/i',
            '/[;&|`$(){}[\]]/',
            '/\b(eval|exec|system|shell_exec|passthru|proc_open|popen)\b/i'
        ];
        
        // Cek HTML/JavaScript patterns
        foreach ($htmlPatterns as $pattern) {
            if (preg_match($pattern, $input)) {
                Log::warning('HTML/JavaScript pattern detected', ['pattern' => $pattern, 'input' => $input]);
                return true;
            }
        }
        
        // Cek SQL injection patterns
        foreach ($sqlPatterns as $pattern) {
            if (preg_match($pattern, $input)) {
                Log::warning('SQL injection pattern detected', ['pattern' => $pattern, 'input' => $input]);
                return true;
            }
        }
        
        // Cek command injection patterns
        foreach ($commandPatterns as $pattern) {
            if (preg_match($pattern, $input)) {
                Log::warning('Command injection pattern detected', ['pattern' => $pattern, 'input' => $input]);
                return true;
            }
        }
        
        // Cek karakter berbahaya yang berlebihan
        $dangerousChars = ['<', '>', '"', "'", '&', ';', '|', '`', '$', '(', ')', '{', '}', '[', ']'];
        $dangerousCount = 0;
        foreach ($dangerousChars as $char) {
            $dangerousCount += substr_count($input, $char);
        }
        
        // Jika terlalu banyak karakter berbahaya, anggap berbahaya
        if ($dangerousCount > 5) {
            Log::warning('Too many dangerous characters detected', ['count' => $dangerousCount, 'input' => $input]);
            return true;
        }
        
        return false;
    }
    
}
