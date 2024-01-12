<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function store(Request $request)
    {
        // Check if a user is logged in
        if (!Auth::check()) {
            return back()->with('error', 'You must be logged in to create a token.');
        }
        
        // Check if the user is an admin
        if (!Auth::user()->roles->contains('name', 'admin')) {
            return back()->with('error', 'Only admins can create tokens.');
        }

        $token = Auth::user()->createToken($request->name)->plainTextToken;

        return back()->with('status', 'Token created successfully');
    }
}
