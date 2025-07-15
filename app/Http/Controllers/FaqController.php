<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $lang = $request->get('lang', 'id');
        $faqs = Faq::where('language', $lang)->get();
        return response()->json($faqs);
    }

    public function getFaqs(Request $request)
    {
        $lang = $request->get('lang', 'id');
        $faqs = Faq::where('language', $lang)
            ->select('question', 'answer')
            ->get();
        return response()->json($faqs);
    }
}