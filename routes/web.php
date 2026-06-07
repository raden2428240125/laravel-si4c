<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DashboardController;

Route::get('/', fn() => redirect()->route('dashboard'));
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('fakultas', FakultasController::class);
Route::resource('periode', PeriodeController::class);
Route::resource('berita', BeritaController::class);
Route::resource('prodi', ProdiController::class);
Route::resource('mahasiswa', MahasiswaController::class);
