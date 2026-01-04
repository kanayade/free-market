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
// 商品一覧画面
Route::get('/',[ItemController::class,'index']);
// 商品詳細画面
Route::get('/item/{item_id}',[ItemController::class,'show']);

Route::middleware('auth')->group(function () {
// 商品購入画面
Route::get('/purchase/{item_id}', [PurchaseController::class, 'index']);
Route::post('/purchase/{item_id}', [PurchaseController::class, 'store']);
// 商品出品画面
Route::get('/sell', [ItemController::class, 'create']);
Route::post('/', [ItemController::class, 'store']);
// いいね
Route::post('/items/{item}/favorite', [FavoriteController::class, 'store']);
Route::delete('/items/{item}/favorite', [FavoriteController::class, 'destroy']);
// プロフ画面
Route::get('/mypage',[UserController::class,'index']);
Route::post('/mypage',[UserController::class,'store']);
});