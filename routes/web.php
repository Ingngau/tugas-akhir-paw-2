<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\BeritaController;

use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\JadwalController;

// Halaman Utama
Route::get('/', function () {
    return view('home');
});

// Profil
Route::get('/profil', function () {
    return view('profil.index');
});

// ROUTE UNTUK CRUD SISWA
Route::resource('siswa', SiswaController::class);

// ROUTE UNTUK CRUD GURU
Route::resource('guru', GuruController::class);

// ROUTE UNTUK CRUD BERITA
Route::resource('berita', BeritaController::class);

Route::resource('pengumuman', PengumumanController::class);
Route::resource('prestasi', PrestasiController::class);
Route::resource('kelas', KelasController::class);
Route::resource('ekstrakurikuler', EkstrakurikulerController::class);
Route::resource('mapel', MapelController::class);
Route::resource('nilai', NilaiController::class);
Route::resource('jadwal', JadwalController::class);
