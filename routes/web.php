<?php

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
    return view('templates.categorias');
});


route::get('/app/items/add','ItemController@add');
route::post('/app/items/add/process','ItemController@addProcess');

route::get('/app/producttypes/add','ProducttypeController@add')->name('producttypes.add');
route::post('/app/producttypes/add/process','ProducttypeController@addProcess');
route::get('app/producttypes/getdata','ProducttypeController@getdata')->name('producttypes.getdata');
route::get('app/producttypes/list','ProducttypeController@list')->name('producttypes.list');
route::get('app/producttypes/{producttype_id}','ProducttypeController@details')->name('producttypes.details');
route::post('app/producttypes/{producttype_id}/edit/process','ProducttypeController@editprocess')->name('producttypes.editprocess');
route::get('app/producttypes/{producttype_id}/delete','ProducttypeController@delete')->name('producttypes.delete');




