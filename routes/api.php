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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/tokens', [TokenController::class, 'store'])->name('tokens.store');

Route::middleware('auth:sanctum')->group(function () {
    // News routes
    Route::apiResource('news', NewsApiController::class);

    // FAQ routes
    Route::apiResource('faq', FaqApiController::class);
});