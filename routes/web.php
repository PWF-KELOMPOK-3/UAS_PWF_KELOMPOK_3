<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TitikPembuanganController;
use Illuminate\Support\Facades\Route;

// Rute utama ke halaman beranda
Route::get('/', function () {
    return view('Beranda');
});

// Rute untuk halaman titik pembuangan
Route::get('/Titik_Pembuangan', [TitikPembuanganController::class, 'index'])->name('titik_pembuangan.index');

// Rute login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Rute resource untuk artikel (CRUD)
Route::resource('artikel', ArtikelController::class);

// Rute untuk halaman dashboard admin
Route::get('/admin', [DashboardController::class, 'index']);

Route::get('/titik_admin', [TitikPembuanganController::class, 'adminIndex'])->name('titik_admin.index');

// Rute untuk menambah titik pembuangan
Route::get('/titik_pembuangan/create', [TitikPembuanganController::class, 'create'])->name('titik_pembuangan.create');

// Rute untuk menyimpan titik pembuangan
Route::post('/titik_pembuangan', [TitikPembuanganController::class, 'store'])->name('titik_pembuangan.store');

// Rute untuk mengedit titik pembuangan
Route::get('/titik_pembuangan/{titik_pembuangan}/edit', [TitikPembuanganController::class, 'edit'])->name('titik_pembuangan.edit');

// Rute untuk memperbarui titik pembuangan
Route::put('/titik_pembuangan/{titik_pembuangan}', [TitikPembuanganController::class, 'update'])->name('titik_pembuangan.update');

// Rute untuk menghapus titik pembuangan
Route::delete('/titik_pembuangan/{titik_pembuangan}', [TitikPembuanganController::class, 'destroy'])->name('titik_pembuangan.destroy');

// Rute untuk artikel admin - menuju halaman Admin_Artikel_Index.blade.php
Route::get('/artikel_admin', [ArtikelController::class, 'adminIndex'])->name('artikel.admin');

// Rute untuk artikel user - menuju halaman Artikel.blade.php
Route::get('/artikel_user', [ArtikelController::class, 'index'])->name('artikel.user');


