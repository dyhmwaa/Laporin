<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TanggapanController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// ✍️ Laporan warga (user)
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
Route::get('/laporan/create', [LaporanController::class, 'create'])->name('laporan.create');
Route::post('/laporan/store', [LaporanController::class, 'store'])->name('laporan.store');
Route::get('/laporan/success', [LaporanController::class, 'success'])->name('laporan.success');

// ✍️ Auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ✍️ Admin area
Route::prefix('admin')->middleware('auth')->group(function () {
    // Dashboard admin
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    // Detail laporan + aksi admin
    Route::get('/laporan/{laporan}', [AdminController::class, 'show'])->name('admin.laporan.show');
    Route::put('/laporan/{laporan}/status', [AdminController::class, 'updateStatus'])->name('admin.laporan.updateStatus');
    Route::delete('/laporan/{laporan}', [AdminController::class, 'destroy'])->name('admin.laporan.destroy');

    // 🗣️ Tanggapan admin
    Route::post('/laporan/{laporan}/tanggapan', [TanggapanController::class, 'store'])->name('admin.laporan.storeTanggapan');
    Route::delete('/tanggapan/{tanggapan}', [TanggapanController::class, 'destroy'])->name('admin.laporan.deleteTanggapan');

    // 📄 Export PDF
    Route::get('/laporan/export/pdf', [LaporanController::class, 'exportPdf'])->name('admin.laporan.exportPdf');
    Route::get('/laporan/{laporan}/export/pdf', [LaporanController::class, 'exportPdfDetail'])->name('admin.laporan.exportPdfDetail');
});

// ✍️ Kategori
Route::resource('kategori', KategoriController::class)->middleware('auth');
