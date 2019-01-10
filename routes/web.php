<?php

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
    return view('theme::index');
});

Route::get('/00_PG', 'Investis\PGPDFController@generatePDF');
Route::get('/01_mandat', 'Investis\MandatPDFController@generatePDF');
Route::get('/02_el_cl', 'Investis\ELCLPDFController@generatePDF');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::group(['prefix' => 'cgps'], function(){
      Route::get('/{cgp}/generate-convention', 'Investis\CGPController@generatePDF')->name('admin.cgps.generate-convention');
    });

    Route::group(['prefix' => 'scns'], function(){
      Route::post('/bulk', 'Investis\SNCController@bulkCreate')->name('admin.sncs.bulk-add');
    });

    Route::group(['prefix' => 'mandat'], function(){
      Route::get('/calculate/{field}', 'Investis\MandatController@calculate')->name('admin.mandat.api.calculate');
      Route::get('/{mandat}/calculate/{field}', 'Investis\MandatController@calculate')->name('admin.mandat.edit.calculate');
    });

});
