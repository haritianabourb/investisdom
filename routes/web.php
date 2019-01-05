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

Route::get('/test-view', function () {

    $data['nom'] = 'NAME';
    $data['adresse'] = 'ADDRESS';
    $data['cgpville'] = 'VILLE';
    $data['cgpcp'] = '123';

    $data['forme_juridique'] = 'REGISTRATION';
    $data['immatriculation'] = 'IMMATRIC';
    $data['nom_representant'] = 'REPRESENT';
    $data['prenom'] = 'PRENOM';

    $data['dateconvention'] = date ("d-m-Y");
    $data['fonction'] = 'FONCTION';
    $data['civilite'] = "M.";
    $data['siret'] = 'KEY';
    $data['capital'] = '123';
    $data['lieu_immatriculation'] = '123';
    $data['madate'] = date ("d-m-Y");
    $data['annee']=date("Y", strtotime(date ("d-m-Y")));

    return view('pdf.cgps.convention', $data);
});

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
