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
    return view('templates.maincontainer');
});
Route::get('/app/items', function () {
    return view('items.add');
});
//Route::get('/app/items/add'.'ItemController@add');
//Route::post('/app/items/add/process'.'ItemController@addProcess');
