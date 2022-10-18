<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('c_product', App\Http\Controllers\CProductController::class);

Route::resource('area', App\Http\Controllers\AreaController::class);

Route::resource('user', App\Http\Controllers\UserController::class);

Route::resource('getarea', App\Http\Controllers\GetAreaController::class);

// Route::get('/user','App\Http\Controllers\UserController@create');