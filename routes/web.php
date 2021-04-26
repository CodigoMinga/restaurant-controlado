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

Route::get('/app/login/resetpassword/{user_id}/token/{token}',            'MainController@passwordRessetToken');
Route::post('/app/login/resetpassword/{user_id}/token/{token}/process',   'MainController@passwordRessetTokenProcess');

//ESTAS RUTAS NECESITAN ESTAR LOGUEADO
Route::group(['middleware' => ['auth']], function() {

    //CLIENTE
    Route::get('/app/clients/list',                         'ClientController@list')->name('clients.list');
    Route::get('/app/clients/add',                          'ClientController@add')->name('clients.add');
    Route::post('/app/clients/add/process',                 'ClientController@addProcess');
    Route::get('/app/clients/{client_id}',                  'ClientController@details');
    Route::post('/app/clients/{client_id}/edit/process',    'ClientController@editprocess');
    Route::get('/app/clients/{client_id}/delete',           'ClientController@delete');

    Route::get('/clients/getdata',                          'ClientController@getdata');
    Route::post('/clients/store',                           'ClientController@store');

    //ORDENES
    Route::get('/tables',                       'OrderController@tables');
    Route::get('/tableorder/{table_id}',        'OrderController@tableorder');
    Route::get('/orderstart/{table_id}',        'OrderController@orderstart');
    Route::get('/productselection/{order_id}',  'OrderController@productselection');
    Route::post('/productattach',               'OrderController@productattach');
    Route::post('/orderdetails/command',        'OrderController@command');
    Route::get('/orderdetails/{order_id}',      'OrderController@orderdetails');
    Route::get('/changetable/{order_id}',       'OrderController@changetable');
    Route::get('/order/{order_id}/chagetable/{table_id}',       'OrderController@changetableProcess');
    
    //ITEMS
    route::get('/items/list',               'ItemController@list')->name('items.list');
    route::get('/items/add',                'ItemController@add')->name('items.add');
    route::get('/items/{item_id}',          'ItemController@details')->name('items.details');
    route::get('/items/{item_id}/delete',   'ItemController@delete')->name('items.delete');
    route::post('/items/process',           'ItemController@process')->name('items.process');
    
    //USUARIOS
    route::get('/users/list',               'UserController@list')->name('users.list');
    route::get('/users/add',                'UserController@add')->name('users.add');
    Route::get('/users/passwordchange',     'UserController@passwordchange');
    route::get('/users/{user_id}',          'UserController@details')->name('users.details');
    route::get('/users/{user_id}/delete',   'UserController@delete')->name('users.delete');
    route::post('/users/process',           'UserController@process')->name('users.process');
    //CAMBIAR CLAVE
    Route::post('/users/passwordchange/process','UserController@passwordchangeProcess');
    
    //CATEGORIAS (PRODUCTTYPES)
    route::get('/producttypes/list',                    'ProducttypeController@list')->name('producttypes.list');
    route::get('/producttypes/add',                     'ProducttypeController@add')->name('producttypes.add');
    route::get('/producttypes/{producttype_id}',        'ProducttypeController@details')->name('producttypes.details');
    route::get('/producttypes/{producttype_id}/delete', 'ProducttypeController@delete')->name('producttypes.delete');
    route::post('/producttypes/process',                'ProducttypeController@process');

    //PRODUCTOS
    Route::get('/products/list',                        'ProductController@list')->name('products.list');
    Route::get('/products/add',                         'ProductController@add')->name('products.add');
    Route::get('/products/{product_id}',                'ProductController@details')->name('products.details');
    Route::get('/products/{product_id}/delete',         'ProductController@delete');
    Route::post('/products/process',                    'ProductController@process');

    //MESAS
    Route::get('/tables/list',                        'TableController@list')->name('tables.list');
    Route::get('/tables/add',                         'TableController@add')->name('tables.add');
    Route::get('/tables/{table_id}',                  'TableController@details')->name('tables.details');
    Route::get('/tables/{table_id}/delete',           'TableController@delete');
    Route::post('/tables/process',                    'TableController@process');

    //RECETA
    Route::post('/prescriptions/store',                     'PrescriptionController@store');
    Route::get('/prescriptions/{prescription_id}',          'PrescriptionController@details');
    Route::get('/prescriptions/{prescription_id}/delete',   'PrescriptionController@delete');

    //Detalle de Receta
    Route::post('/prescriptiondetails/store',                           'PrescriptiondetailController@store');
    Route::get('/prescriptiondetails/{prescriptiondetail_id}',          'PrescriptiondetailController@select');
    Route::get('/prescriptiondetails/{prescriptiondetail_id}/delete',   'PrescriptiondetailController@delete');

    //COMPAÑIAS
    route::get('/ompanys/add',                         'CompanyController@add')->name('companys.add');
    route::post('/companys/add/process',                'CompanyController@addProcess');
    route::get('/companys/list',                        'CompanyController@list')->name('companys.list');
    route::get('/companys/{company_id}',                'CompanyController@details');
    route::post('/companys/{company_id}/edit/process',  'CompanyController@editprocess');
    route::get('/companys/{company_id}/delete',         'CompanyController@delete');

    //LOGOUT
    route::get('/app/logout','MainController@logout');
    

    Route::get('prueba',function(){
        $orderdetail = App\Orderdetail::findOrFail(1);
        $prescription= $orderdetail->product->prescriptions->last();
        dd($prescription->prescriptiondetails);
    });

});

//rutas ajax
route::get('/ajax/generateInvoice/{order_id}','SalesHelper@generateInvoice');






