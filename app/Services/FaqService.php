<?php

namespace App\Services;

use App\Models\Faq;
use Illuminate\Support\Facades\Log;

class FaqService
{
    /**
     * Finds the best matching FAQ for a given message.
     *
     * @param string $message The user's message.
     * @param string $lang The language code.
     * @return \App\Models\Faq|null The best matching FAQ or null if no match is found.
     */
    public function findBestMatch(string $message, string $lang): ?Faq
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

        // Threshold can be configured in config/chatbot.php
        return $highestScore >= config('chatbot.faq_match_threshold', 70) ? $bestMatch : null;
    }
}
