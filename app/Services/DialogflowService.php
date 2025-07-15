<?php

namespace App\Services;

use GuzzleHttp\Client;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Log;

class DialogflowService
{
    /**
     * Detects the user's intent using the Dialogflow API.
     *
     * @param string $message The user's message.
     * @param string $lang The language code.
     * @param string $sessionId The session ID for the conversation.
     * @return array The result from Dialogflow.
     */
    public function detectIntent(string $message, string $lang, string $sessionId): array
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
            Log::info('Dialogflow API Result:', $result);

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
            Log::error('Dialogflow API Error in DialogflowService:', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
            
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
}