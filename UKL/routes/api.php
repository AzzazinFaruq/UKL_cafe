<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukCon;
use App\Http\Controllers\transaksi;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//log route
Route::post('register',[AuthController::class,'register']);
Route::post('login', [AuthController::class,'login']);
Route::post('refresh', [AuthController::class,'refresh']);
Route::post('logout', [AuthController::class,'logout']);
//CRUD
Route::get('get',[ProdukCon::class,'getproduk']);
Route::get('get/{id}',[ProdukCon::class,'getproduk1']);
Route::post('add',[ProdukCon::class,'addproduk']);
Route::put('change/{id}',[ProdukCon::class,'updateproduk']);
Route::delete('delete/{id}',[ProdukCon::class,'deleteproduk']);
//Transaksi
Route::post('order',[transaksi::class,'order']);
Route::post('tambahitem/{id}',[transaksi::class,'tambahItem']);
Route::get('getorder/{id}',[transaksi::class,'getdetail']);
Route::get('getorder',[transaksi::class,'getdetailall']);

