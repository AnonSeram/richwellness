<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Services\ChatbotService;
use GuzzleHttp\Client;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    protected $chatbotService;

    public function __construct(ChatbotService $chatbotService)
    {
        $this->chatbotService = $chatbotService;
    }

    public function index()
    {
        return view('chat');
    }

    public function welcome()
    {
        return response()->json($this->chatbotService->getWelcomeMessage());
    }

    public function chat(Request $request)
    {
        $message = $request->input('message');
        $lang = $request->input('lang', 'id');

        // 🔍 Coba deteksi intent dinamis berbasis keyword
        $dynamicResponse = $this->handleDynamicIntents($message, $lang);
        if ($dynamicResponse) {
            return response()->json([
                'reply' => $dynamicResponse,
                'source' => 'dynamic'
            ]);
        }

        // 🔍 Coba cari jawaban dari FAQ lokal dulu
        $faqMatch = $this->findBestMatch($message, $lang);
        if ($faqMatch) {
            return response()->json([
                'reply' => $faqMatch->answer,
                'source' => 'faq'
            ]);
        }

        // 🤖 Jika tidak ada di FAQ atau intent, gunakan Dialogflow untuk DETEKSI INTENT
        // Kita hanya butuh intent dan parameter di sini, fulfillment akan ditangani di backend Laravel
        $dialogflowResult = $this->detectIntentWithDialogflow($message, $lang);
        
        Log::info('Dialogflow Detection Result:', $dialogflowResult);

        // === Tangani Intent yang terdeteksi oleh Dialogflow ===
        if ($dialogflowResult['success']) {
            $intent = $dialogflowResult['intent'];
            $parameters = $dialogflowResult['parameters'];

            Log::info('Dialogflow Detected Intent:', ['intent' => $intent, 'parameters' => $parameters]);

            // Jika intent terkait kamar, ambil data kamar dan berikan response
            if ($intent === 'Cek-kamar') {
                 // Ambil data kamar tersedia dari tabel kamar
                $totalKamarTersedia = \DB::table('kamar')->where('status', 'tersedia')->count();
                $kamarTersedia = \DB::table('kamar')
                    ->select('tipe_kamar', \DB::raw('count(*) as jumlah'))
                    ->where('status', 'tersedia')
                    ->groupBy('tipe_kamar')
                    ->get();

                Log::info('Data Kamar Tersedia (from ChatbotController):', [
                    'total' => $totalKamarTersedia,
                    'detail' => $kamarTersedia->toArray()
                ]);

                if ($totalKamarTersedia > 0) {
                    $responseText = "Jumlah kamar yang tersedia saat ini: $totalKamarTersedia kamar\n\n";
                    $responseText .= "Detail kamar tersedia:\n";
                    foreach ($kamarTersedia as $kamar) {
                        $responseText .= "- {$kamar->tipe_kamar}: {$kamar->jumlah} kamar\n";
                    }
                } else {
                    $responseText = "Maaf, saat ini tidak ada kamar yang tersedia.";
                }

                 return response()->json([
                    'reply' => $responseText,
                    'source' => 'dialogflow-handled' // Indikasi intent ditangani di backend
                ]);

            } else {
                // Jika intent terdeteksi tapi bukan 'Cek-kamar', gunakan fulfillment text dari Dialogflow
                $fulfillmentText = $dialogflowResult['fulfillment_text'] ?? 'Maaf, saya tidak mengerti pertanyaan Anda.';
                 return response()->json([
                    'reply' => $fulfillmentText,
                    'source' => 'dialogflow'
                ]);
            }

        } else {
            // Jika Dialogflow gagal mendeteksi intent, berikan fallback umum
            Log::error('Dialogflow Intent Detection Failed:', $dialogflowResult);
            return response()->json([
                'reply' => 'Maaf, saya mengalami kesulitan memahami pertanyaan Anda. Bisakah Anda mengulanginya dengan cara lain?',
                'source' => 'dialogflow-fallback'
            ]);
        }
    }

    // Metode baru untuk deteksi intent saja
    private function detectIntentWithDialogflow($message, $lang)
    {
        try {
            $projectId = config('services.dialogflow.project_id');
            $credentialsPath = config('services.dialogflow.credentials_path');

            if (!file_exists($credentialsPath)) {
                throw new \Exception('Dialogflow credentials file not found at: ' . $credentialsPath);
            }

            $credentials = json_decode(file_get_contents($credentialsPath), true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception('Invalid JSON in credentials file: ' . json_last_error_msg());
            }

            $client = new Client();

            // Generate JWT and get Access Token
            $now = time();
            $token = [
                'iss' => $credentials['client_email'],
                'sub' => $credentials['client_email'],
                'aud' => 'https://oauth2.googleapis.com/token',
                'iat' => $now,
                'exp' => $now + 3600,
                'scope' => 'https://www.googleapis.com/auth/dialogflow'
            ];

            $jwt = JWT::encode($token, $credentials['private_key'], 'RS256');

            $response = $client->post('https://oauth2.googleapis.com/token', [
                'form_params' => [
                    'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
                    'assertion' => $jwt
                ]
            ]);

            $authResult = json_decode($response->getBody(), true);
            $accessToken = $authResult['access_token'];

            // Send detectIntent request to Dialogflow REST API
            $sessionId = uniqid(); // Gunakan session ID unik atau dari user jika ada stateful chat
            $session = "projects/{$projectId}/agent/sessions/{$sessionId}";

            $response = $client->post(
                "https://dialogflow.googleapis.com/v2/{$session}:detectIntent",
                [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $accessToken,
                        'Content-Type' => 'application/json',
                    ],
                    'json' => [
                        'queryInput' => [
                            'text' => [
                                'text' => $message,
                                'languageCode' => $lang,
                            ],
                        ]
                    ],
                ]
            );

            $result = json_decode($response->getBody(), true);

            // Log respons lengkap dari Dialogflow API
            Log::info('Dialogflow API Result:', $result);

            // Ekstrak informasi yang relevan
            $queryResult = $result['queryResult'] ?? null;

            if ($queryResult) {
                 return [
                    'success' => true,
                    'intent' => $queryResult['intent']['displayName'] ?? null,
                    'confidence' => $queryResult['intentDetectionConfidence'] ?? 0,
                    'parameters' => $queryResult['parameters'] ?? [],
                    'fulfillment_text' => $queryResult['fulfillmentText'] ?? ''
                ];
            } else {
                 return [
                    'success' => false,
                    'error' => 'Invalid Dialogflow API response format.',
                    'response' => $result
                ];
            }

        } catch (\Exception $e) {
            Log::error('Dialogflow API Error in ChatbotController:', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                // 'trace' => $e->getTraceAsString()
            ]);
            
             return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
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

        // Tingkatkan threshold menjadi 70% (sesuaikan jika perlu)
        return $highestScore >= 70 ? $bestMatch : null; // Menurunkan sedikit threshold FAQ agar lebih mudah match
    }
        
        return null;
}
