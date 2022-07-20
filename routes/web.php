<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\kat_toko;

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


Auth::routes();

//

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/kat_toko', [kat_toko::class,'index']);
Route::get('/kat_toko/form', [kat_toko::class,'create']);
Route::post('/kat_toko/tambah', [kat_toko::class,'store']);
Route::get('/kat_toko/formedit/{id}', [kat_toko::class,'edit']);
Route::put('/kat_toko/edit/{id}', [kat_toko::class,'update']);
Route::delete('/kat_toko/delete/{id}', [kat_toko::class,'destroy']);
