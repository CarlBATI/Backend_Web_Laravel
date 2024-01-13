<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TokenApiController extends Controller
{
    public function store(Request $request)
    {
        $user = $request->user(); // Assumes the usage of Breeze's authentication

        // Validate the request if needed
        $request->validate([
            'token_name' => 'required|string|max:255',
        ]);

        // Create a personal access token for the user
        $token = $user->createToken($request->input('token_name'), ['*']);

        return back()->with('status', 'Token created!')->with('token', $token->plainTextToken);
    }
}
