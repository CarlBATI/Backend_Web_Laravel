<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// Controllers
use App\Http\Controllers\AboutController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// TODO
Route::get('/', function () {
    return view('welcome');
});

// TODO
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Public routes
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::prefix('news')->name('news.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/{id}', [NewsController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [NewsController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [NewsController::class, 'update'])->name('update');
    Route::post('/{id}', [NewsController::class, 'create'])->name('create');
});
Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('destroy');

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

// Protected routes
Route::middleware('auth')->group(function () {
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__.'/auth.php';
