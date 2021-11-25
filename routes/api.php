<?php

use Illuminate\Support\Facades\Route;

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

Route::namespace ('App\Http\Controllers\Api')->group(function () {
    //数据字典
    Route::any('dd1', 'DdController@getDd');

    //计算
    Route::any('t', 'CalculateController@compute');
    //规则清单
    Route::any('rule', 'RuleController@list');
    //元素
    Route::any('element', 'ElementController@items');

});

Route::namespace ('App\Http\Controllers\Api')->prefix('auth')->group(function () {
    Route::any('login', 'AuthController@login');
    Route::any('logout', 'AuthController@logout');
});

Route::namespace ('App\Http\Controllers\Api')->middleware(['refresh.token'])->group(function () {
    //数据字典
    Route::any('dd', 'DdController@getDd');
});
