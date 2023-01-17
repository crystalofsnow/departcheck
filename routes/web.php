<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

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




Route::get('/', [OrderController::class, 'index']);

/*
Route::get('/orders/{order}', [OrderController::class , 'choose']);
//'Orders/{対象データID}'にGetリクエストが来たら，OrderControllerのchooseメソッドを実行する
*/
Route::post('/orders/count',[OrderController::class, 'count']);
Route::post('orders/merc',[OrderController::class, 'merc']);
Route::post('/orders', [OrderController::class, 'send']);
Route::get('/orders/choose', [OrderController::class, 'choose']);

Route::get('/orders/choose_value', [OrderController::class, 'choose_value']);
Route::get('/orders/subtotal', [OrderController::class, 'subtotal']);
