<?php

use Illuminate\Support\Facades\Route;
use Controllers\HomeController;
use Controllers\ExpenditureController;


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

Route::get('/','App\Http\Controllers\HomeController@index');


Auth::routes();

Route::get('/liste','App\Http\Controllers\ExpenditureController@create');

Route::resource('expenditures','App\Http\Controllers\ExpenditureController');
