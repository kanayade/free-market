<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\UserController;

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

Route::get('/',[ItemController::class,'index']);
Route::get('/item/{item_id}',[ItemController::class,'show']);

Route::middleware('auth')->group(function () {
Route::get('/purchase/{item_id}', [PurchaseController::class, 'index']);
Route::post('/purchase/{item_id}', [PurchaseController::class, 'store']);
Route::get('/purchase/address/{item_id}', [PurchaseController::class, 'edit']);
Route::post('/purchase/address/{item_id}', [PurchaseController::class, 'update']);
Route::get('/sell', [ItemController::class, 'create']);
Route::post('/', [ItemController::class, 'store']);
Route::post('/items/{item}/favorite', [FavoriteController::class, 'store']);
Route::delete('/items/{item}/favorite', [FavoriteController::class, 'destroy']);
Route::get('/mypage',[UserController::class,'index']);
Route::post('/mypage',[UserController::class,'update']);
Route::get('/mypage/edit',[UserController::class,'edit']);
});