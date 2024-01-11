<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutLink;
use App\Models\AboutCategory;

class AboutController extends Controller
{
    public function index()
    {
        $categories = AboutCategory::with('links')->get();
        return view('about', ['categories' => $categories]);  
    }
}
