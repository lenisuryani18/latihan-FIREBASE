<?php

use App\Http\Controllers\FirebaseController;
use Illuminate\Support\Facades\Route;



Route::get('dashboard', [FirebaseController::class, 'dashboard']);

// dosen
Route::get('dosen', [FirebaseController::class, 'dosen']);
Route::get('dosen/tambah', [FirebaseController::class, 'dosenCreate']);
Route::post('dosen/store', [FirebaseController::class, 'dosenStore']);

// mahasiswa
Route::get('mahasiswa', [FirebaseController::class, 'mahasiswa']);

// matakuliah
Route::get('matakuliah', [FirebaseController::class, 'matakuliah']);
