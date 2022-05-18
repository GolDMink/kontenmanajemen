<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

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
    return view('auth/loginn');
});

Route::get('/test', function () {
    $data = DB::table('users')->where('users.id', 2)
            ->join('contentwriter as c','c.id_user','users.id')
        ->first();
    dd($data);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// ROUTE LEADER
Route::group(['middleware' => ['auth','Leader'], 'prefix' => 'leader'], function () {
    Route::get('/dashboard','DashboardController@leaderIndex' )->name('leader.dashboard');
    Route::get('/getpost','DashboardController@dataPost' )->name('leader.datapost');
    Route::get('/getcontent','DashboardController@dataContent' )->name('leader.datacontent');

    // Kelola Client
    Route::get('client','ClientController@index')->name('leader.client');
    Route::get('clientedit/{id}','ClientController@edit')->name('leader.editclient');
    Route::post('updateclient/{id}','ClientController@update')->name('leader.updateclient');
    Route::post('client','ClientController@simpan')->name('leader.simpanclient');
    Route::get('hapusclient/{id}','ClientController@hapus')->name('leader.hapusclient');

    // Kelola Designer
    Route::get('designer','DesignerController@index')->name('leader.designer');
    Route::get('designeredit/{id}','DesignerController@edit')->name('leader.editdesigner');
    Route::post('updatedesigner/{id}','DesignerController@update')->name('leader.updatedesigner');
    Route::post('designer','DesignerController@simpan')->name('leader.simpandesigner');
    Route::get('hapusdesigner/{id}','DesignerController@hapus')->name('leader.hapusdesigner');

    // Kelola Cw
    Route::get('Cw','CwController@index')->name('leader.Cw');
    Route::get('Cwedit/{id}','CwController@edit')->name('leader.editCw');
    Route::post('updateCw/{id}','CwController@update')->name('leader.updateCw');
    Route::post('Cw','CwController@simpan')->name('leader.simpanCw');
    Route::get('hapusCw/{id}','CwController@hapus')->name('leader.hapusCw');
});

// ROUTE CONTENT WRITER
Route::group(['middleware' => ['auth','Cw'], 'prefix' => 'contentwriter'], function () {
    Route::get('/dashboard','DashboardController@indexcw' )->name('cw');

    // KELOLA KONTEN
    Route::get('konten','AgendaPostController@indexContent')->name('cw.konten');
    Route::get('kontenEdit/{id}','AgendaPostController@editContent')->name('cw.kontenedit');
    Route::post('updateKonten/{id}','AgendaPostController@updateContent')->name('cw.update');
    Route::post('simpankonten','AgendaPostController@simpanContent')->name('cw.simpannKonten');
    Route::get('hapusKonten/{id}','AgendaPostController@hapusContent')->name('cw.hapusKonten');

    // KELOLA AGENDA
    Route::get('agenda','AgendaPostController@index')->name('cw.agenda');
    Route::get('agenda/{id}','AgendaPostController@edit')->name('agenda.edit');
    Route::post('update/{id}','AgendaPostController@update')->name('cw.update');
    Route::post('simpan','AgendaController@simpan')->name('cw.simpanagenda');
    Route::get('hapus/{id}','AgendaPostController@hapus')->name('cw.hapusagenda');

});


// ROUTE DESIGNER
Route::group(['middleware' => ['auth','Designer'], 'prefix' => 'designer'], function () {
    Route::get('/dashboard','Designer\DashboardController@index' )->name('designer');

     // KELOLA KONTEN
     Route::get('konten','AgendaPostController@showKonten')->name('designer.konten');
     Route::get('getdesign/{id}','AgendaPostController@getDesign')->name('designer.design');
     Route::get('kontenEdit/{id}','AgendaPostController@edit')->name('cw.kontenedit');
     Route::post('updateKonten/{id}','AgendaPostController@update')->name('cw.update');
     Route::post('konten','AgendaPostController@simpan')->name('cw.simpanKonten');
     Route::get('hapusDesign/{id}','AgendaPostController@hapusDesign')->name('designer.hapusDesign');
     Route::post('uploaddesign/{id}','AgendaPostController@uploaddesign')->name('cw.uploaddesign');

     // KELOLA AGENDA
    Route::get('agenda','AgendaPostController@designerIndex')->name('designer.agenda');
    Route::get('konfirmasi/{id}','AgendaPostController@konfirmasi')->name('designer.konfirmasi');
});

