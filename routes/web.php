<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    return view('startGame');
})->name('home');

Route::get('/playGame', 'App\Http\Controllers\HomeController@index');
Route::get('api/move/', 'App\Http\Controllers\ApiController@move');
Route::get('reset', 'App\Http\Controllers\HomeController@reset');

