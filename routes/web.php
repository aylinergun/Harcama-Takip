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

Route::get('/','App\Http\Controllers\HomeController@addExpenditures');

Route::get('/list','App\Http\Controllers\HomeController@listExpenditures')->name('show');

Auth::routes();

Route::resource('expenditures','App\Http\Controllers\ExpenditureController');
