<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [OrderController::class, 'first'])->name('first');
/*
Route::get('/orders/{order}', [OrderController::class , 'choose']);
//'Orders/{対象データID}'にGetリクエストが来たら，OrderControllerのchooseメソッドを実行する
*/
Route::post('/orders/member_submit',[OrderController::class, 'member_submit']);
Route::post('/orders/firststock',[OrderController::class, 'firststock']);
Route::post('/orders/comfirm',[OrderController::class, 'comfirm']);
Route::post('/orders/count',[OrderController::class, 'count']);
Route::post('orders/merc',[OrderController::class, 'merc']);
Route::post('/orders', [OrderController::class, 'send']);
Route::get('/orders/choose', [OrderController::class, 'choose'])->name('checkout');

Route::get('/orders/choose_value', [OrderController::class, 'choose_value']);
Route::get('/orders/subtotal', [OrderController::class, 'subtotal']);
Route::get('/orders/finished', [OrderController::class, 'finished']);


Route::get('/orders/members', [OrderController::class, 'members'])->name('members');
Route::get('orders/regist_comple', [OrderController::class, 'regist_comple']);

require __DIR__.'/auth.php';
