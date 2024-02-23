<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\JenjangController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatkulController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'bagian:'Akademik','Mahasiswa''])->group(function () {
    Route::get('/mapel', [MapelController::class, 'index']);
    Route::get('/mapel/datatables', [MapelController::class, 'getDataTable']);
    Route::get('/mapel/{id}', [MapelController::class, 'show']);
    Route::post('/mapel', [MapelController::class, 'store']);
    Route::put('/mapel/{id}', [MapelController::class, 'update']);
    Route::delete('/mapel/{id}', [MapelController::class, 'destroy']);
    Route::get('/mapel/prodis-json', 'MapelController@getProdisJson');

});

Route::middleware('auth')->group(function () {  
    Route::get('/pengguna', [PenggunaController::class, 'index']);
    Route::get('/pengguna/datatables', [PenggunaController::class, 'getDataTable']);
    Route::get('/pengguna/{id}', [PenggunaController::class, 'show']);
    Route::post('/pengguna', [PenggunaController::class, 'store']);
    Route::put('/pengguna/{id}', [PenggunaController::class, 'update']);
    Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy']);
    

// Rute Jenjang
Route::get('/jenjang', [JenjangController::class, 'index']);
Route::get('/jenjang/datatables', [JenjangController::class, 'getDataTable']);
Route::get('/jenjang/{id}', [JenjangController::class, 'show']);
Route::post('/jenjang', [JenjangController::class, 'store']);
Route::put('/jenjang/{id}', [JenjangController::class, 'update']);
Route::delete('/jenjang/{id}', [JenjangController::class, 'destroy']);



//mahasiswa

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::get('/mahasiswa/datatables', [MahasiswaController::class, 'getDataTable']);
Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'show']);
Route::post('/mahasiswa', [MahasiswaController::class, 'store']);
Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update']);
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy']);


// Rute Prodi
Route::get('/prodi', [ProdiController::class, 'index']);
Route::get('/prodi/datatables', [ProdiController::class, 'getDataTable'])->name('prodi.datatables');
Route::get('/prodi/{id}/edit', [ProdiController::class, 'edit']);
Route::post('/prodi', [ProdiController::class, 'store'])->name('prodi.store');
Route::put('/prodi/{id}', [ProdiController::class, 'update']);
Route::delete('/prodi/{id}', [ProdiController::class, 'destroy']);
Route::delete('/prodi/destroy/all', [ProdiController::class, 'destroyAll'])->name('prodi.destroy.all');



Route::get('/matkul', [MatkulController::class, 'index']);
Route::get('/matkul/datatables', [MatkulController::class, 'getDataTable'])->name('matkul.datatables');
Route::get('/matkul/prodidata', [MatkulController::class, 'getProdiData']);
Route::get('/matkul/{id}', [MatkulController::class, 'show']);
Route::post('/matkul', [MatkulController::class, 'store']);
Route::put('/matkul/{id}', [MatkulController::class, 'update']);
Route::delete('/matkul/{id}', [MatkulController::class, 'destroy']);
Route::delete('/matkul/destroy/all', [MatkulController::class, 'destroyAll'])->name('matkul.destroy.all');


});

require __DIR__.'/auth.php';
