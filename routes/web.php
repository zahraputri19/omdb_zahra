<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PanelControl\DashboardController;
use Illuminate\Support\Facades\Route;


//swith language
Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        session(['locale' => $locale]);
        App::setLocale($locale);
    }
    return redirect()->back();
});

// Routing untuk Auth
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'register_process'])->name('signup');
Route::post('/login', [AuthController::class, 'login'])->name('signin');
Route::get('/logout', [AuthController::class, 'logout'])->name('signout');

Route::prefix('controlpanel')->middleware('checkLogin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::get('/Favorites', function () {
    return view('controlpanel.my');
})->name('favorite');
