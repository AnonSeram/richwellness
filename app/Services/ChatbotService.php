<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\DataKamar;

class ChatbotService
{
    protected $dialogflowService;
    protected $faqService;

    public function __construct(DialogflowService $dialogflowService, FaqService $faqService)
    {
        $this->dialogflowService = $dialogflowService;
        $this->faqService = $faqService;
    }

    public function getWelcomeMessage(): array
    {
        return [
            'success' => true,
            'message' => [
                'text' => "Selamat datang di Rich Wellness Chatbot! 👋\n\n" .
                         "Saya adalah asisten virtual yang siap membantu Anda dengan informasi tentang layanan kami.\n\n"
            ]
        ];
    }

    public function processMessage(string $message, string $lang, string $sessionId): array
    {
        // Prioritas 1: Dialogflow
        $dialogflowResult = $this->dialogflowService->detectIntent($message, $lang, $sessionId);
        
        Log::info('Dialogflow Detection Result:', $dialogflowResult);

        if ($dialogflowResult['success'] && $dialogflowResult['confidence'] > config('chatbot.dialogflow_confidence_threshold', 0.7)) {
            $intent = $dialogflowResult['intent'];

            if ($intent === 'cek_kamar') {
                if (!empty($dialogflowResult['fulfillment_text'])) {
                    return [
                        'reply' => $dialogflowResult['fulfillment_text'],
                        'source' => 'dialogflow-webhook'
                    ];
                } else {
                    return [
                        'reply' => $this->getKamarData($lang),
                        'source' => 'dialogflow-local-data'
                    ];
                }
            }

            if (!empty($dialogflowResult['fulfillment_text'])) {
                return [
                    'reply' => $dialogflowResult['fulfillment_text'],
                    'source' => 'dialogflow-fulfillment'
                ];
            }
        }

        // Prioritas 2: FAQ
        $faqMatch = $this->faqService->findBestMatch($message, $lang);
        if ($faqMatch) {
            return [
                'reply' => $faqMatch->answer,
                'source' => 'faq'
            ];
        }

        // Fallback response
        return [
            'reply' => $lang === 'id' ? 'Maaf, saya tidak mengerti pertanyaan Anda.' : 'Sorry, I do not understand your question.',
            'source' => 'fallback'
        ];
    }

    public function getKamarData(string $lang): string
    {
        // Ambil data kamar real-time dari model DataKamar
        $totalKamarTersedia = DataKamar::where('status', 'tersedia')->sum('jumlah_tersedia');
        $kamarTersedia = DataKamar::where('status', 'tersedia')
            ->select('tipe_kamar', DB::raw('SUM(jumlah_tersedia) as jumlah'))
            ->groupBy('tipe_kamar')
            ->get();

        Log::info('Data Kamar Tersedia:', [
            'total' => $totalKamarTersedia,
            'detail' => $kamarTersedia->toArray()
        ]);

        if ($totalKamarTersedia > 0) {
            $responseText = $lang === 'id' 
                ? "Jumlah kamar yang tersedia saat ini: {$totalKamarTersedia} kamar\n\nDetail kamar tersedia:\n"
                : "Number of available rooms: {$totalKamarTersedia} rooms\n\nAvailable room details:\n";
            
            foreach ($kamarTersedia as $kamar) {
                $responseText .= "- {$kamar->tipe_kamar}: {$kamar->jumlah} " . ($lang === 'id' ? 'kamar' : 'rooms') . "\n";
            }
        } else {
            $responseText = $lang === 'id' 
                ? "Maaf, saat ini tidak ada kamar yang tersedia."
                : "Sorry, there are no rooms available at the moment.";
        }

        return $responseText;
    }
}