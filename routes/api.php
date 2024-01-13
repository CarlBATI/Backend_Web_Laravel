<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\NewsApiController;
use App\Http\Controllers\API\FaqApiController;
use App\Http\Controllers\API\TokenApiController;

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
    Route::apiResource('tokens', TokenApiController::class);
    Route::apiResource('news', NewsApiController::class);
    Route::apiResource('faq', FaqApiController::class);
});