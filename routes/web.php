<?php

use Illuminate\Support\Facades\Route;
use Controllers\HomeController;
use Controllers\CategoryController;
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




Route::get('/expenditure', [App\Http\Controllers\ExpenditureController::class, 'index'])->name('create');

Auth::routes();

Route::get('/categories','App\Http\Controllers\CategoryController@index');


Route::resource('expenditures','App\Http\Controllers\ExpenditureController');

//Route::post('/expenditures/create','App\Http\Controllers\ExpenditureController@store');
