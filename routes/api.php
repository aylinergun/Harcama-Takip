<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Expenditure;
use App\Http\Controllers\Api\V1\ExpenditureController;

use App\Http\Resources\ExpenditureResource as ExpenditureCollection;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('expendituresPage','App\Http\Controllers\Api\V1\ExpenditureController@expendituresPage');
Route::get('maxExpenditure','App\Http\Controllers\Api\V1\ExpenditureController@maxExpenditure');
Route::get('minExpenditure','App\Http\Controllers\Api\V1\ExpenditureController@minExpenditure');
Route::get('lastExpenditure','App\Http\Controllers\Api\V1\ExpenditureController@lastExpenditure');
Route::get('annualExpenditures','App\Http\Controllers\Api\V1\ExpenditureController@annualExpenditures');
Route::get('monthlyExpenditures','App\Http\Controllers\Api\V1\ExpenditureController@monthlyExpenditures');
Route::get('expenditureLocations','App\Http\Controllers\Api\V1\ExpenditureController@expenditureLocations');
Route::get('actualExpenditures','App\Http\Controllers\Api\V1\ExpenditureController@actualExpenditures');
Route::get('categoryExpenditures','App\Http\Controllers\Api\V1\ExpenditureController@categoryExpenditures');
Route::get('allExpenditures','App\Http\Controllers\Api\V1\ExpenditureController@allExpenditures');



Route::get('/store',function(){
  return ExpenditureCollection::collection(Expenditure::all());
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
