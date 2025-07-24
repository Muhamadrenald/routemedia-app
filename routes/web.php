<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\PaketInternetController;

Route::get('/', function () {
    // Jika sudah login, arahkan ke daftar klien. Jika tidak, tampilkan halaman welcome.
    return auth()->check() ? redirect()->route('klien.index') : view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rute Klien
    // Route::get('/klien/list', [KlienController::class, 'index'])->name('klien.list');
    // Route::resource('klien', KlienController::class)->except(['index']);
    Route::resource('klien', KlienController::class);

    // Rute Paket Internet
    Route::resource('paket', PaketInternetController::class);
});

require __DIR__ . '/auth.php';
