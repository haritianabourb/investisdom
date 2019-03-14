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

// All of these are pdf for snc!!!
//Route::get('/00_PG', 'PGPDFController@generatePDF');
//Route::get('/01_mandat', 'MandatPDFController@generatePDF');
//Route::get('/02_el_cl', 'ELCLPDFController@generatePDF');
//Route::get('/02_soc_cl', 'SOCCLPDFController@generatePDF');
//Route::get('/03_el_acc', 'ELACCPDFController@generatePDF');
//Route::get('/03_soc_acc', 'SOCACCPDFController@generatePDF');
//Route::get('/04_banq_fact_frais', 'BanqFactFraisPDFController@generatePDF');
//Route::get('/04_cash_fact_tva', 'CashFactFraisPDFController@generatePDF');
//Route::get('/05_banq_pvag_pvr', 'BanqPvagPvrPDFController@generatePDF');
//Route::get('/23_da_banq', 'DaBanqPDFController@generatePDF');
//Route::get('/p_14_mi', 'P14MiPDFController@generatePDF');
//Route::get('/p_15', 'P15PDFController@generatePDF');
//Route::get('/p_18', 'P18PDFController@generatePDF');
//Route::get('/p_24', 'P24FactVentePDFController@generatePDF');
//Route::get('/p_25', 'P25PDFController@generatePDF');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::group(['prefix' => 'cgps'], function(){
      Route::get('/{cgp}/generate-convention', 'Investis\CGPController@generatePDF')->name('admin.cgps.generate-convention');
    });

    Route::group(['prefix' => 'documents'], function(){
        Route::get('/', 'Investis\CGPController@getDocuments')->name('admin.documents.cgp');
        Route::post('/{cgp?}', 'Investis\CGPController@setDocument')->name('admin.documents.cgp.store');
    });

    Route::group(['prefix' => 'mandat'], function(){
      Route::get('/calculate/{field}', 'Investis\MandatController@calculate')->name('admin.mandat.api.calculate');
      Route::get('/{mandat}/calculate/{field}', 'Investis\MandatController@calculate')->name('admin.mandat.edit.calculate');
    });

    Route::group(['prefix' => 'reservations'], function(){
      Route::get('/{reservation}/generate-recherche', 'Investis\ReservationController@generatePDFRecherche')->name('admin.reservations.generate-recherche');
      Route::get('/{reservation}/generate-mandat', 'Investis\ReservationController@generatePDFMandat')->name('admin.reservations.generate-mandat');
      Route::get('/{reservation}/generate-sepa', 'Investis\ReservationController@generatePDFSEPA')->name('admin.reservations.generate-sepa');
      Route::get('/{reservation}/yousign', 'Investis\ReservationController@yousign')->name('admin.reservations.yousign');
    });

    Route::group(['prefix' => 'scns'], function(){
      Route::post('/bulk', 'Investis\SNCController@bulkCreate')->name('admin.sncs.bulk-add');
    });

    Route::group(['prefix' => 'simulateur'], function(){
        Route::get("/", 'Investis\CGPController@simulator')->name('admin.cgps.simulator');
        Route::post("/", 'Investis\CGPController@simulate')->name('admin.cgps.simulator.simulate');
    });

});
