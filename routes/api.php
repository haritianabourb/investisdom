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

//Route::middleware('auth:api, admin.user')->namespace('leaseholders', function (Request $request) {
//Route::namespace('leaseholders', function (Request $request) {
Route::get('leaseholders', 'API\LeaseholderController@index')->name('api.leaseholders.index');
Route::get('leaseholders/{leaseholder}', 'API\LeaseholderController@show')->name('api.leaseholders.show');
//});
