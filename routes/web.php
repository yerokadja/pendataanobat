<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApotekerController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanPengunaaController;
use App\Http\Controllers\Login;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\ObatexpController;
use App\Http\Controllers\ObathabisController;
use App\Http\Controllers\ObatkeluarChart;
use App\Http\Controllers\ObatKeluarController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PemasukController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// route login
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
// akhir route login


// route dashboard
Route::middleware('cek')->prefix('/dashboard')->group(function () {
    Route::get('/', [AdminController::class, 'index']);

    Route::get('/obat', [ObatController::class, 'index']);
    Route::get('/obat/create', [ObatController::class, 'create']);
    Route::post('/obat/store', [ObatController::class, 'store']);
    Route::get('/obat/edit/{id}', [ObatController::class, 'edit']);
    Route::put('/obat/update/{id}', [ObatController::class, 'update']);
    Route::DELETE('/obat/delete/{id}', [ObatController::class, 'delete']);
    Route::get('/obat/cetak', [CetakController::class, 'cetak']);

    Route::resource('/expired', ObatexpController::class);
    Route::resource('/habis', ObathabisController::class);
    Route::resource('/kategori', KategoriController::class);
    Route::resource('/unit', UnitController::class);
    Route::resource('/pemasok', PemasukController::class);
    Route::resource('/obat-keluar', ObatKeluarController::class);
    Route::get('/obat-keluar/chart', [ObatkeluarChart::class, 'index']);
    Route::resource('/dokter', DokterController::class);
    Route::resource('/pasien', PasienController::class);
    Route::resource('/apoteker', ApotekerController::class);
    Route::resource('/permintaan', PermintaanController::class);
    Route::get('/permintaan/cetak/{id}', [CetakController::class, 'cetakresep']);
    Route::get('/permintaan/grafik', [GrafikController::class, 'permintaan']);
    Route::get('/laporanpenggunaan', [LaporanPengunaaController::class, 'cetak']);
});
// akhir route dashboard
