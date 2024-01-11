<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutLink;
use App\Models\AboutCategory;

class AboutController extends Controller
{
    public function index()
    {
        $links = AboutLink::all();
        $categories = AboutCategory::all();
        return view('about', ['links' => $links, 'categories' => $categories]);
    }
}
