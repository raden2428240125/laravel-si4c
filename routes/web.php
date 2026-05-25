<?php

use App\Http\Controllers\FakultasController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/fakultas', FakultasController::class)->parameters
(['fakultas' => 'fakultas']);
Route::resource('/periode', PeriodeController::class)->parameters
(['periode' => 'periode']);
Route::resource('/prodi', ProdiController::class)->parameters
(['prodi' => 'prodi']);
Route::resource('/mahasiswa', MahasiswaController::class)->parameters
(['mahasiswa' => 'mahasiswa']);