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
//Unidades de Medida
route::get('/app/measureunits/add','MeasureunitController@add')->name('measureunits.add');
route::post('/app/measureunits/add/process','MeasureunitController@addProcess');
route::get('app/measureunits/list','MeasureunitController@list')->name('measureunits.list');
route::get('app/measureunits/{measureunit_id}','MeasureunitController@details')->name('measureunits.details');
route::post('app/measureunits/{measureunit_id}/edit/process','MeasureunitController@editprocess')->name('measureunits.editprocess');
route::get('app/measureunits/{measureunit_id}/delete','MeasureunitController@delete')->name('measureunitvs.delete');
Route::get('/login',function(){
    return view('login.login');
});

//Insumos
route::get('/app/items/add','ItemController@add')->name('items.add');
route::post('/app/items/add/process','ItemController@addProcess');
route::get('app/items/getdata','ItemController@getdata')->name('producttypes.getdata');
route::get('app/items/list','ItemController@list')->name('items.list');
route::get('app/items/{item_id}','ItemController@details')->name('items.details');
route::post('app/items/{item_id}/edit/process','ItemController@editprocess')->name('items.editprocess');
route::get('app/items/{item_id}/delete','ItemController@delete')->name('items.delete');

//categorias
route::get('/app/producttypes/add','ProducttypeController@add')->name('producttypes.add');
route::post('/app/producttypes/add/process','ProducttypeController@addProcess');
route::get('app/producttypes/getdata','ProducttypeController@getdata')->name('producttypes.getdata');
route::get('app/producttypes/list','ProducttypeController@list')->name('producttypes.list');
route::get('app/producttypes/{producttype_id}','ProducttypeController@details')->name('producttypes.details');
route::post('app/producttypes/{producttype_id}/edit/process','ProducttypeController@editprocess')->name('producttypes.editprocess');
route::get('app/producttypes/{producttype_id}/delete','ProducttypeController@delete')->name('producttypes.delete');




