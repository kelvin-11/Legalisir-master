<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\IjasahController;
use App\Http\Controllers\TransaksiController;

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
Route::get('/', function(){
    return view('dashboard');
});
Route::get('/home', [SiswaController::class, 'index']);
Route::resource('/dashboard', SiswaController::class);
Route::post('/find-data', [SiswaController::class, 'find']);
// Route::get('/find-data', [SiswaController::class, 'displayData'])->name('displayData');
Route::post('/find-data/{id}/upload', [SiswaController::class, 'update']);

// Transaksi
Route::post('/transaksi/{id}',[TransaksiController::class, 'index']);
Route::post('/transaksi/',[TransaksiController::class, 'store']);
Route::get('/transaksi/show/{id}',[TransaksiController::class, 'show']);

// History
Route::post('/history', [SiswaController::class, 'history']);
Route::get('/tampil', [SiswaController::class, 'tampil']);

// Konfirmasi Pesanan
Route::post('/pesanan/{id}',[TransaksiController::class, 'pesanan']);

// Auth Admin
Route::get('/login',[LoginController::class, 'index'])->middleware('guest');
Route::post('/login',[LoginController::class, 'create']);
Route::post('/logout',[LoginController::class, 'logout']);

// Route view Admin..................................................
Route::group(['middleware' => ['auth']], function(){
    Route::get('/home-admin',[AdminController::class,'index']);

    //Admin ...
    Route::get('/admin',[UserController::class,'index']);
    Route::post('/admin/store',[UserController::class,'store']);
    Route::post('/admin/{id}/update',[UserController::class,'update']);
    Route::get('/admin/{id}/destroy',[UserController::class,'destroy']);

    //Ijasah . . .
    Route::get('/ijasah',[IjasahController::class,'index']);
    Route::post('/ijasah/store',[IjasahController::class,'store']);
    Route::post('/ijasah/{id}/update',[IjasahController::class,'update']);
    Route::get('/ijasah/{id}/destroy',[IjasahController::class,'destroy']);

    //Transaksi . . .
    Route::get('/transaksi-admin',[TransaksiController::class,'view']);
    Route::post('/transaksi/{id}/update',[TransaksiController::class,'update']);
    Route::get('/transaksi/{id}/destroy',[TransaksiController::class,'destroy']);

    //Jasa Kirim . . .
    Route::get('/jasa-kirim',[JasaController::class,'index']);
    Route::post('/jasa-kirim/store',[JasaController::class,'store']);
    Route::post('/jasa-kirim/{id}/update',[JasaController::class,'update']);
    Route::get('/jasa-kirim/{id}/destroy',[JasaController::class,'destroy']);
});
