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
Route::get('total-expenditure-yearly','App\Http\Controllers\Api\V1\ExpenditureController@totalExpenditureYearly');
Route::get('expenditure-location-count','App\Http\Controllers\Api\V1\ExpenditureController@expenditureLocationCount');
Route::get('current-month-expenditure','App\Http\Controllers\Api\V1\ExpenditureController@currentMonthExpenditure');
Route::get('category-expenditures','App\Http\Controllers\Api\V1\ExpenditureController@categoryExpenditures');
Route::get('all-expenditures','App\Http\Controllers\Api\V1\ExpenditureController@allExpenditures');
Route::post('create-expenditure','App\Http\Controllers\Api\V1\ExpenditureController@createExpenditure');

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
