<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqCategory;
use App\Models\FaqPair;

class FaqController extends Controller
{
    public function index()
    {
        $faqCategories = FaqCategory::with('faqPairs')->get();
        return view('faq', compact('faqCategories'));
    }
}
