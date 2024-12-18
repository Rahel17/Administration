<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function(){
	return view('landingpage');
});

Route::get('/dashboardUser', function(){
	return view('dashboardUser')->name('dashboardUser');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
    Route::post('/anggota/store', [AnggotaController::class, 'store'])->name('anggota.store');
    Route::put('/anggota/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
    Route::delete('/anggota/{id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
});

Route::get('/pemasukan', [PemasukanController::class, 'index'])->name('pemasukan.index');
Route::get('/pemasukan/riwayat', [PemasukanController::class, 'indexRiwayat'])->name('pemasukan.riwayat');
Route::put('/pemasukan/{id}/ajukan-kembali', [PemasukanController::class, 'ajukanKembali'])->name('pemasukan.ajukanKembali');
Route::post('/pemasukan/store', [PemasukanController::class, 'store'])->name('pemasukan.store');
Route::get('/pemasukan/edit/{id}', [PemasukanController::class, 'edit'])->name('pemasukan.edit');
Route::put('/pemasukan/update/{id}', [PemasukanController::class, 'update'])->name('pemasukan.update');
Route::delete('/pemasukan/destroy/{id}', [PemasukanController::class, 'destroy'])->name('pemasukan.destroy');
Route::post('/pemasukan/approve/{id}', [PemasukanController::class, 'approve'])->name('pemasukan.approve');
Route::post('/pemasukan/reject/{id}', [PemasukanController::class, 'reject'])->name('pemasukan.reject');
Route::post('/pemasukan/update-status/{id}', [PemasukanController::class, 'updateStatus']);

Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran.index');
Route::get('/pengeluaran/riwayat', [PengeluaranController::class, 'indexRiwayat'])->name('pengeluaran.riwayat');
Route::put('/pengeluaran/{id}/ajukan-kembali', [PengeluaranController::class, 'ajukanKembali'])->name('pengeluaran.ajukanKembali');
Route::post('/pengeluaran/store', [PengeluaranController::class, 'store'])->name('pengeluaran.store');
Route::get('/pengeluaran/edit/{id}', [PengeluaranController::class, 'edit'])->name('pengeluaran.edit');
Route::put('/pengeluaran/update/{id}', [PengeluaranController::class, 'update'])->name('pengeluaran.update');
Route::delete('/pengeluaran/destroy/{id}', [PengeluaranController::class, 'destroy'])->name('pengeluaran.destroy');
Route::post('/pengeluaran/approve/{id}', [PengeluaranController::class, 'approve'])->name('pengeluaran.approve');
Route::post('/pengeluaran/reject/{id}', [PengeluaranController::class, 'reject'])->name('pengeluaran.reject');
Route::post('/pengeluaran/update-status/{id}', [PengeluaranController::class, 'updateStatus']);

Route::get('/kas', [KasController::class, 'index'])->name('kas.index');
Route::get('/kas/riwayat', [KasController::class, 'indexRiwayat'])->name('kas.riwayat');
Route::post('/kas', [KasController::class, 'store'])->name('kas.store');
Route::put('/kas/{id}', [KasController::class, 'update'])->name('kas.update');
// Route::get('/kas/edit/{id}', [KasController::class, 'edit'])->name('kas.edit');
// Route::put('/kas/update/{id}', [KasController::class, 'update'])->name('kas.update');
// Route::delete('/kas/destroy/{id}', [KasController::class, 'destroy'])->name('kas.destroy');


// Route::post('/password/whatsapp', [PasswordResetLinkController::class, 'sendResetLinkViaWhatsApp'])->name('password.whatsapp');


require __DIR__.'/auth.php';
