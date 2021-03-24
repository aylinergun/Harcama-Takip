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

Route::group(['prefix'=>'/v1'],function(){

Route::get('main-expenditure','App\Http\Controllers\Api\V1\ExpenditureController@mainExpenditure');
Route::get('max-expenditure','App\Http\Controllers\Api\V1\ExpenditureController@maxExpenditure');
Route::get('min-expenditure','App\Http\Controllers\Api\V1\ExpenditureController@minExpenditure');
Route::get('last-expenditure','App\Http\Controllers\Api\V1\ExpenditureController@lastExpenditure');
Route::get('annual-expenditures','App\Http\Controllers\Api\V1\ExpenditureController@annualExpenditures');
Route::get('monthly-expenditures','App\Http\Controllers\Api\V1\ExpenditureController@monthlyExpenditures');
Route::get('expenditure-locations','App\Http\Controllers\Api\V1\ExpenditureController@expenditureLocations');
Route::get('actual-expenditures','App\Http\Controllers\Api\V1\ExpenditureController@actualExpenditures');
Route::get('category-expenditures','App\Http\Controllers\Api\V1\ExpenditureController@categoryExpenditures');
Route::get('all-expenditures','App\Http\Controllers\Api\V1\ExpenditureController@allExpenditures');

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
