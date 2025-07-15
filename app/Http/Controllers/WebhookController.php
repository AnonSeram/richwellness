<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\DataKamar;

class WebhookController extends Controller
{
    public function handleDialogflow(Request $request)
    {
        $start = microtime(true);
        // Log request untuk debugging
        Log::info('Dialogflow Webhook Request:', $request->all());

        // Ambil intent/parameter dari Dialogflow
        $intent = $request->input('queryResult.intent.displayName');
        $queryText = $request->input('queryResult.queryText');
        $parameters = $request->input('queryResult.parameters', []);
        
        Log::info('Intent and Query:', [
            'intent' => $intent,
            'query' => $queryText,
            'parameters' => $parameters
        ]);

        $fulfillmentText = "Maaf, ada kesalahan. Mohon coba lagi.";

        // Tidak ada lagi pengecekan greetings/sapaan di sini
        $kamarKeywords = ['kamar', 'kosong', 'tersedia', 'jumlah', 'berapa'];
        $containsKamarKeyword = false;
        foreach ($kamarKeywords as $keyword) {
            if (stripos($queryText, $keyword) !== false) {
                $containsKamarKeyword = true;
                break;
            }
        }
        if (is_null($intent) && $containsKamarKeyword) {
            // Fallback: jika intent null tapi query mengandung kata kunci kamar
            $kamarTersedia = DataKamar::getKamarTersedia();
            $totalKamarTersedia = DataKamar::getTotalKamarTersedia();
            Log::info('Data Kamar Tersedia (fallback):', [
                'total' => $totalKamarTersedia,
                'detail' => $kamarTersedia->toArray()
            ]);
            if ($totalKamarTersedia > 0) {
                $fulfillmentText = "Jumlah kamar yang tersedia saat ini: $totalKamarTersedia kamar\n\n";
                $fulfillmentText .= "Detail kamar tersedia:\n";
                foreach ($kamarTersedia as $kamar) {
                    $fulfillmentText .= "- {$kamar->tipe_kamar}: {$kamar->jumlah_tersedia} kamar\n";
                }
            } else {
                $fulfillmentText = "Maaf, saat ini tidak ada kamar yang tersedia.";
            }
        } else {
            // Cek berbagai kemungkinan intent
            switch ($intent) {
                case 'cek-kamar':
                case 'cek_kamar':
                case 'Default Fallback Intent':
                    // Cek apakah query mengandung kata kunci terkait kamar
                    $kamarKeywords = ['kamar', 'kosong', 'tersedia', 'jumlah', 'berapa'];
                    $containsKamarKeyword = false;
                    
                    foreach ($kamarKeywords as $keyword) {
                        if (stripos($queryText, $keyword) !== false) {
                            $containsKamarKeyword = true;
                            break;
                        }
                    }

                    if ($containsKamarKeyword) {
                        // Ambil data kamar tersedia
                        $kamarTersedia = DataKamar::getKamarTersedia();
                        $totalKamarTersedia = DataKamar::getTotalKamarTersedia();
                        
                        Log::info('Data Kamar Tersedia:', [
                            'total' => $totalKamarTersedia,
                            'detail' => $kamarTersedia->toArray()
                        ]);

                        if ($totalKamarTersedia > 0) {
                            $fulfillmentText = "Jumlah kamar yang tersedia saat ini: $totalKamarTersedia kamar\n\n";
                            $fulfillmentText .= "Detail kamar tersedia:\n";
                            foreach ($kamarTersedia as $kamar) {
                                $fulfillmentText .= "- {$kamar->tipe_kamar}: {$kamar->jumlah_tersedia} kamar\n";
                            }
                        } else {
                            $fulfillmentText = "Maaf, saat ini tidak ada kamar yang tersedia.";
                        }
                    } else {
                        // Jika tidak mengandung kata kunci kamar, berikan response default
                        $fulfillmentText = "Maaf, saya belum bisa menjawab permintaan Anda.";
                    }
                    break;

                default:
                    // Intent lain jika ada
                    $fulfillmentText = "Maaf, saya tidak mengerti permintaan Anda.";
                    break;
            }
        }

        // --- Mengirim Respon ke Dialogflow ---
        $response = [
            'fulfillmentText' => $fulfillmentText,
            'fulfillmentMessages' => [
                [
                    'text' => [
                        'text' => [$fulfillmentText]
                    ]
                ]
            ]
        ];

        Log::info('Dialogflow Webhook Response:', $response);
        Log::info('Webhook processing time: ' . (microtime(true) - $start) . ' seconds');
        return response()->json($response);
    }
}
