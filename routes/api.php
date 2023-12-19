<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BeritaController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [LoginController::class, 'login']);
// Route::get('/keuangan', [KeuanganController::class, 'index']);
// Route::get('/keuangan/{id}', [KeuanganController::class, 'show']);
// Route::post('/keuangan', [KeuanganController::class, 'store']);
// Route::put('/keuangan/{id}', [KeuanganController::class, 'update']);

Route::get('/keuangan', [KeuanganController::class, 'index'])->name('api.keuangan.index');
Route::get('/keuangan/{id}', [KeuanganController::class, 'show'])->name('api.keuangan.show');
Route::post('/keuangan', [KeuanganController::class, 'store'])->name('api.keuangan.store');
Route::delete('/keuangan/{id}', [KeuanganController::class, 'destroy'])->name('api.keuangan.destroy');
Route::get('/siswa', [SiswaController::class, 'index'])->name('api.siswa.index');
Route::get('/siswa/{id}', [SiswaController::class, 'show'])->name('api.siswa.show');
Route::post('/siswa', [SiswaController::class, 'store'])->name('api.siswa.store');
Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('api.siswa.update');
Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('api.siswa.destroy');
Route::get('/berita', [BeritaController::class, 'index'])->name('api.berita.index');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('api.berita.show');
Route::post('/berita', [BeritaController::class, 'store'])->name('api.berita.store');
Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('api.berita.update');
Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('api.berita.destroy');



// Route::get('/keuangan', [KeuanganController::class, 'getKeuangan']);
// Route::post('/keuangan', [KeuanganController::class, 'postKeuangan']);


