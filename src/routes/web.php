<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PurchaseController;

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

Route::get('/purchase/{item_id}', [PurchaseController::class, 'index']);
Route::post('/purchase/{item_id}', [PurchaseController::class, 'store']);