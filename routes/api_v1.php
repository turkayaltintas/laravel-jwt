<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Controllers\Api\V1\CustomerController;
use App\Http\Controllers\Api\V1\CarController;
use App\Http\Controllers\Api\V1\ServiceController;
use App\Http\Controllers\Api\V1\OrderController;
use App\Http\Controllers\ProductController;

Route::get('/', function (){
   return view('welcome');
});
Route::post('login', [ApiController::class, 'authenticate']);
Route::post('register', [ApiController::class, 'register']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [ApiController::class, 'logout']);
    Route::get('get_user', [CustomerController::class, 'get_user']);
    Route::get('get_balance', [CustomerController::class, 'get_balance']);
    Route::post('add_balance', [CustomerController::class, 'add_balance']);
    Route::get('cars', [CarController::class, 'index']);
    Route::get('services', [ServiceController::class, 'index']);
    Route::get('my_orders', [OrderController::class, 'index']);
    Route::post('my_order/create', [OrderController::class, 'store']);
    Route::put('my_order/update/{order}', [OrderController::class, 'update']);
    Route::delete('my_order/delete/{order}',  [OrderController::class, 'destroy']);
});
