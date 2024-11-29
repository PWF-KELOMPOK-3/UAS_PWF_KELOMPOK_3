<?php

use App\Http\Controllers\API\ArtikelAPIController;
use App\Http\Controllers\API\DashboardAPIController;
use App\Http\Controllers\API\TitikPembuanganAPIController;
use Illuminate\Support\Facades\Route;

// Rute untuk halaman titik pembuangan
Route::get('/Titik_Pembuangan', [TitikPembuanganAPIController::class, 'index'])->name('api.titik_pembuangan.index');

// Rute resource untuk artikel (CRUD)
Route::resource('artikel', ArtikelAPIController::class);

// Rute untuk halaman dashboard admin
Route::get('/admin', [DashboardAPIController::class, 'index']);

Route::get('/titik_admin', [TitikPembuanganApiController::class, 'adminIndex'])->name('api.titik_admin.index');

// Rute untuk menambah titik pembuangan
Route::get('/titik_pembuangan/create', [TitikPembuanganApiController::class, 'create'])->name('api.titik_pembuangan.create');

// Rute untuk menyimpan titik pembuangan
Route::post('/titik_pembuangan', [TitikPembuanganApiController::class, 'store'])->name('api.titik_pembuangan.store');

// Rute untuk mengedit titik pembuangan
Route::get('/titik_pembuangan/{titik_pembuangan}/edit', [TitikPembuanganApiController::class, 'edit'])->name('api.titik_pembuangan.edit');

// Rute untuk memperbarui titik pembuangan
Route::put('/titik_pembuangan/{titik_pembuangan}', [TitikPembuanganApiController::class, 'update'])->name('api.titik_pembuangan.update');

// Rute untuk menghapus titik pembuangan
Route::delete('/titik_pembuangan/{titik_pembuangan}', [TitikPembuanganApiController::class, 'destroy'])->name('api.titik_pembuangan.destroy');

// Rute untuk artikel admin - menuju halaman Admin_Artikel_Index.blade.php
Route::get('/artikel_admin', [ArtikelApiController::class, 'adminIndex'])->name('api.artikel.admin');

// Rute untuk artikel user - menuju halaman Artikel.blade.php
Route::get('/artikel_user', [ArtikelApiController::class, 'index'])->name('api.artikel.user');