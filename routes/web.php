<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PemasukanController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function(){
	return view('landingpage');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/pemasukan', [PemasukanController::class, 'index'])->name('pemasukan.index');
Route::post('/pemasukan/store', [PemasukanController::class, 'store'])->name('pemasukan.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
    Route::post('/anggota/store', [AnggotaController::class, 'store'])->name('anggota.store');
});

// Route::post('/password/whatsapp', [PasswordResetLinkController::class, 'sendResetLinkViaWhatsApp'])->name('password.whatsapp');


require __DIR__.'/auth.php';
