<?php

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
    $id = 1;
    $user = 1;

    $konten = DB::table('agenda_post')
            ->where('id',$id)
            ->where('id_designer',$user)
            ->get();
    return $konten;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// ROUTE LEADER
Route::group(['middleware' => ['auth','Leader'], 'prefix' => 'leader','namespace'=>'Leader'], function () {
    Route::get('/dashboard','DashboardController@index' )->name('leader');

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
    Route::get('konten','AgendaPostController@index')->name('cw.konten');
    Route::get('kontenEdit/{id}','AgendaPostController@edit')->name('cw.kontenedit');
    Route::post('updateKonten/{id}','AgendaPostController@update')->name('cw.update');
    Route::post('konten','AgendaPostController@simpan')->name('cw.simpanKonten');
    Route::get('hapusKonten/{id}','AgendaPostController@hapus')->name('cw.hapusKonten');

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
     Route::get('kontenEdit/{id}','AgendaPostController@edit')->name('cw.kontenedit');
     Route::post('updateKonten/{id}','AgendaPostController@update')->name('cw.update');
     Route::post('konten','AgendaPostController@simpan')->name('cw.simpanKonten');
     Route::get('hapusKonten/{id}','AgendaPostController@hapus')->name('cw.hapusKonten');
});

