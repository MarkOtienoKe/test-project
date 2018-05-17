<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/food/commodities', ['uses' => 'FoodCommodityController@getFoodCommodities']);
Route::get('/product/varieties', ['uses' => 'FoodCommodityController@getProductVarieties']);
Route::get('/commodity/type', ['uses' => 'FoodCommodityController@getCommodityType']);
