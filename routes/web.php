<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CATATAN: Ini hanya CONTOH ISI routes/web.php.
| Jangan replace file routes/web.php bawaan Breeze kamu secara utuh —
| cukup TAMBAHKAN bagian "Route::middleware('auth')" di bawah ke dalam
| file routes/web.php proyekmu yang sudah ada (jangan duplikat route
| yang sudah ada seperti '/', '/dashboard', dan bagian profile).
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Semua route mahasiswa WAJIB login (middleware auth)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route resource untuk CRUD Mahasiswa
    // Otomatis membuat: index, create, store, show, edit, update, destroy
    Route::resource('mahasiswa', MahasiswaController::class);
});

require __DIR__.'/auth.php';

