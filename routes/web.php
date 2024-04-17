<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\WelcomeController;
use App\Models\BarangModel;

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

Route::get('/', [WelcomeController::class, 'index']);

// Route::get('/kategori', [KategoriController::class, 'index']);

// Route::get('/kategori/create', [KategoriController::class, 'create']);
// Route::post('/kategori', [KategoriController::class, 'store']);

// Route::get('/kategori/update/{id}',[KategoriController::class,'update']);
// Route::put('/kategori/update_save/{id}',[KategoriController::class,'update_save']);

// Route::get('/kategori/destroy/{id}', [KategoriController::class, 'destroy']);

Route::resource('m_user', POSController::class);

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']); 
    Route::post('/list', [UserController::class, 'list']); 
    Route::get('/create', [UserController::class, 'create']); 
    Route::post('/', [UserController::class, 'store']); 
    Route::get('/{id}', [UserController::class, 'show']); 
    Route::get('/{id}/edit', [UserController::class, 'edit']); 
    Route::put('/{id}', [UserController::class, 'update']); 
    Route::delete('/{id}', [UserController::class, 'destroy']); 
});

Route::group(['prefix' => 'level'], function () {
    Route::get('/', [LevelController::class, 'index']); 
    Route::post('/list', [LevelController::class, 'list']); 
    Route::get('/create', [LevelController::class, 'create']); 
    Route::post('/', [LevelController::class, 'store']); 
    Route::get('/{id}', [LevelController::class, 'show']); 
    Route::get('/{id}/edit', [LevelController::class, 'edit']); 
    Route::put('/{id}', [LevelController::class, 'update']); 
    Route::delete('/{id}', [LevelController::class, 'destroy']); 
});

Route::group(['prefix' => 'barang'], function () {
    Route::get('/', [BarangController::class, 'index']); 
    Route::post('/list', [BarangController::class, 'list']); 
    Route::get('/create', [BarangController::class, 'create']); 
    Route::post('/', [BarangController::class, 'store']); 
    Route::get('/{id}', [BarangController::class, 'show']); 
    Route::get('/{id}/edit', [BarangController::class, 'edit']); 
    Route::put('/{id}', [BarangController::class, 'update']); 
    Route::delete('/{id}', [BarangController::class, 'destroy']); 
});

Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', [KategoriController::class, 'index']); 
    Route::post('/list', [KategoriController::class, 'list']); 
    Route::get('/create', [KategoriController::class, 'create']); 
    Route::post('/', [KategoriController::class, 'store']); 
    Route::get('/{id}', [KategoriController::class, 'show']); 
    Route::get('/{id}/edit', [KategoriController::class, 'edit']); 
    Route::put('/{id}', [KategoriController::class, 'update']); 
    Route::delete('/{id}', [KategoriController::class, 'destroy']); 
});

Route::group(['prefix' => 'stok'], function () {
    Route::get('/', [StokController::class, 'index']); 
    Route::post('/list', [StokController::class, 'list']); 
    Route::get('/create', [StokController::class, 'create']); 
    Route::post('/', [StokController::class, 'store']); 
    Route::get('/{id}', [StokController::class, 'show']); 
    Route::get('/{id}/edit', [StokController::class, 'edit']); 
    Route::put('/{id}', [StokController::class, 'update']); 
    Route::delete('/{id}', [StokController::class, 'destroy']); 
});

Route::group(['prefix' => 'penjualan'], function () {
    Route::get('/', [PenjualanController::class, 'index']);        //menampilkan halaman awal
    Route::post('/list', [PenjualanController::class, 'list']);    //menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [PenjualanController::class, 'create']);
    Route::post('/', [PenjualanController::class, 'store']);       //menyimpan data user baru
    Route::get('/{id}', [PenjualanController::class, 'show']);
    Route::get('/{id}/edit', [PenjualanController::class, 'edit']);
    Route::put('/{id}', [PenjualanController::class, 'update']);
    Route::delete('/{id}', [PenjualanController::class, 'destroy']);
});