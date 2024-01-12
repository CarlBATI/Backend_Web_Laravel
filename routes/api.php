<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\NewsApiController;
use App\Http\Controllers\API\FaqApiController;
use App\Http\Controllers\API\TokenController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['web', 'admin'])->group(function () {
    Route::get('user', function (Request $request) {
        return $request->user();
    });

     Route::post('/tokens', function (Request $request) {
        $user = $request->user(); // Assuming you're using Breeze's authentication

        // Validate the request if needed

        // Create a personal access token for the user
        $token = $user->createToken($request->input('token_name'), ['*']);

        return back()->with('status', 'Token created!')->with('token', $token->plainTextToken);
    })->name('tokens.create');


    // Route::post('tokens', [TokenController::class, 'store'])->name('tokens.store');
    Route::apiResource('news', NewsApiController::class);
    Route::apiResource('faq', FaqApiController::class);
});