<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('user', UserController::class);
    Route::apiResource('barang', BarangController::class);
    Route::apiResource('mutasi', MutasiController::class);
    Route::get('barang/mutasi/{id}', [BarangController::class, 'mutasiBarang']);
    Route::get('user/mutasi/{id}', [UserController::class, 'mutasiBarang']);
});
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
