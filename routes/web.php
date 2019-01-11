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
Route::get('/02_soc_cl', 'Investis\SOCCLPDFController@generatePDF');
Route::get('/03_el_acc', 'Investis\ELACCPDFController@generatePDF');
Route::get('/03_soc_acc', 'Investis\SOCACCPDFController@generatePDF');
Route::get('/04_banq_fact_frais', 'Investis\BanqFactFraisPDFController@generatePDF');
Route::get('/04_cash_fact_tva', 'Investis\CashFactFraisPDFController@generatePDF');
Route::get('/05_banq_pvag_pvr', 'Investis\BanqPvagPvrPDFController@generatePDF');
Route::get('/23_da_banq', 'Investis\DaBanqPDFController@generatePDF');
Route::get('/p_14_mi', 'Investis\P14MiPDFController@generatePDF');
Route::get('/p_15', 'Investis\P15PDFController@generatePDF');
Route::get('/p_18', 'Investis\P18PDFController@generatePDF');
Route::get('/p_24', 'Investis\P24FactVentePDFController@generatePDF');
Route::get('/p_25', 'Investis\P25PDFController@generatePDF');

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
