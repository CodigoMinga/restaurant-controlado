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



//LOGIN
Route::get('/',                                 'MainController@login')->name('login');
Route::post('/app/checklogin',                  'MainController@checkLogin');
Route::get('/app/register',                     'MainController@register');
Route::post('/app/register/process',            'MainController@registerProcess');
Route::get('/app/login/passwordlost',           'MainController@passwordLost');
Route::post('/app/login/passwordlost/process',  'MainController@passwordLostProcess');

Route::get('/app/resetpassword/{user_id}/token/{token}',            'MainController@passwordRessetToken');
Route::post('/app/resetpassword/{user_id}/token/{token}/process',   'MainController@passwordRessetTokenProcess');

//ESTAS RUTAS NECESITAN ESTAR LOGUEADO
Route::group(['middleware' => ['auth']], function() {

    //CAMBIAR CLAVE
    Route::get('/app/password/{user_id}/change',            'MainController@passwordChange');
    Route::post('/app/password/{user_id}/change/process',   'MainController@passwordChangeProcess');

    //ORDENES
    Route::get('/tables',                       'OrderController@tables');
    Route::get('/tableorder/{table_id}',        'OrderController@tableorder');
    Route::get('/orderstart/{table_id}',        'OrderController@orderstart');
    Route::get('/productselection/{order_id}',  'OrderController@productselection');
    Route::post('/productattach',               'OrderController@productattach');
    Route::get('/orderdetails/{order_id}',      'OrderController@orderdetails');

    //PRODUCTOS
    Route::get('/app/products/list',                        'ProductController@list')->name('products.list');
    Route::get('/app/products/add',                         'ProductController@add')->name('products.add');
    Route::post('/app/products/add/process',                'ProductController@addProcess');
    Route::get('/app/products/{product_id}',                'ProductController@details');
    //Route::get('/app/products/{product_id}/prescriptions/{prescriptions_id}/details', 'ProductController@details');
    Route::post('/app/products/{product_id}/edit/process',  'ProductController@editprocess');
    Route::get('/app/products/{product_id}/delete',         'ProductController@delete');

    //CATEGORIAS (PRODUCTTYPES)
    route::get('/app/producttypes/add',                             'ProducttypeController@add')->name('producttypes.add');
    route::post('/app/producttypes/add/process',                    'ProducttypeController@addProcess');
    route::get('/app/producttypes/list',                            'ProducttypeController@list')->name('producttypes.list');
    route::get('/app/producttypes/{producttype_id}',                'ProducttypeController@details')->name('producttypes.details');
    route::post('/app/producttypes/{producttype_id}/edit/process',  'ProducttypeController@editprocess')->name('producttypes.editprocess');
    route::get('/app/producttypes/{producttype_id}/delete',         'ProducttypeController@delete')->name('producttypes.delete');

    //UNIDADES DE MEDIDA
    route::get('/app/measureunits/add',                             'MeasureunitController@add')->name('measureunits.add');
    route::post('/app/measureunits/add/process',                    'MeasureunitController@addProcess');
    route::get('/app/measureunits/list',                            'MeasureunitController@list')->name('measureunits.list');
    route::get('/app/measureunits/{measureunit_id}',                'MeasureunitController@details')->name('measureunits.details');
    route::post('/app/measureunits/{measureunit_id}/edit/process',  'MeasureunitController@editprocess')->name('measureunits.editprocess');
    route::get('/app/measureunits/{measureunit_id}/delete',         'MeasureunitController@delete')->name('measureunitvs.delete');

    //ITEMS
    route::get('/app/items/add',                    'ItemController@add')->name('items.add');
    route::post('/app/items/add/process',           'ItemController@addProcess');
    route::get('/app/items/list',                   'ItemController@list')->name('items.list');
    route::get('/app/items/{item_id}/details',      'ItemController@details')->name('items.details');
    route::post('/app/items/{item_id}/edit/process','ItemController@editprocess')->name('items.editprocess');
    route::get('/app/items/{item_id}/delete',       'ItemController@delete')->name('items.delete');

    //COMPAÑIAS
    route::get('/app/companys/add',                         'CompanyController@add')->name('companys.add');
    route::post('/app/companys/add/process',                'CompanyController@addProcess');
    route::get('/app/companys/list',                        'CompanyController@list')->name('companys.list');
    route::get('/app/companys/{company_id}',                'CompanyController@details');
    route::post('/app/companys/{company_id}/edit/process',  'CompanyController@editprocess');
    route::get('/app/companys/{company_id}/delete',         'CompanyController@delete');

    //USUARIOS
    route::get('/app/users/add','RoleController@add')->name('users.add');
    route::post('/app/users/add/process','RoleController@addProcess');
    route::get('/app/users/list','RoleController@list')->name('users.list');
    route::get('/app/users/getdata','RoleController@getdata');
    route::post('/app/users/{user_id}/edit/process','RoleController@editprocess');
    route::get('/app/users/{user_id}','RoleController@details');
        //Cambio de clave
    Route::get('/app/password/{user_id}/passwordchange', 'MainController@passwordChange');
    Route::post('/app/password/{user_id}/passwordchange/process', 'MainController@passwordChangeProcess');
    
    //RECETA
    Route::get('/app/products/{product_id}/prescriptions/add','PrescriptionController@add')->name('prescriptions.add');
    Route::post('/app/products/{product_id}/prescriptions/add/process','PrescriptionController@addProcess');
    route::get('app/prescriptions/getdata','PrescriptionController@getdata')->name('prescriptions.getdata');
    route::get('app/prescriptions/list','PrescriptionController@list')->name('prescriptions.list');
    route::get('/app/products/{product_id}/prescriptions/details','PrescriptionController@details')->name('prescriptions.details');
    route::post('app/prescriptions/{prescription_id}/edit/process','PrescriptionController@editprocess')->name('prescriptions.editprocess');
    route::get('app/prescriptions/{prescription_id}/delete','PrescriptionController@delete')->name('prescriptions.delete');

});

//rutas ajax
route::get('/ajax/generateInvoice/{order_id}','SalesHelper@generateInvoice');






