<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Login;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ObatController;
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
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/obat', [ObatController::class, 'index']);
    Route::get('/obat/create', [ObatController::class, 'create']);
    Route::post('/obat/store', [ObatController::class, 'store']);
    Route::get('/obat/{id}/edit', [ObatController::class, 'edit']);
});
