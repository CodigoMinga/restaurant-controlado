<?php

use Illuminate\Support\Facades\Route;

//LOGIN
Route::get('/',                                 'MainController@login')->name('login');
Route::post('/app/checklogin',                  'MainController@checkLogin');
Route::get('/app/register',                     'MainController@register');
Route::post('/app/register/process',            'MainController@registerProcess');
Route::get('/login/password/lost',              'MainController@passwordLost');
Route::post('/login/password/lost/process',     'MainController@passwordLostProcess');

Route::get('/login/password/reset/{user_id}/token/{token}',            'MainController@passwordResetToken');
Route::post('/login/password/reset/{user_id}/token/{token}/process',   'MainController@passwordResetTokenProcess');

//ESTAS RUTAS NECESITAN ESTAR LOGUEADO
Route::group(['middleware' => ['auth']], function() {

    //CLIENTE
    Route::get('/clients/list',                             'ClientController@list')->name('clients.list');
    Route::get('/clients/getdata',                          'ClientController@getdata');
    Route::get('/clients/add',                              'ClientController@add')->name('clients.add');
    Route::post('/clients/add/process',                     'ClientController@addProcess');
    Route::get('/clients/{client_id}',                      'ClientController@details');
    Route::post('/clients/{client_id}/edit/process',        'ClientController@editprocess');
    Route::get('/clients/{client_id}/delete',               'ClientController@delete');

    Route::post('/clients/store',                           'ClientController@store');

    //pedidos del cliente
    Route::get('/clients/{client_id}/history',             'ClientController@history');

    //ORDENES
    Route::get('/orders/list',                              'OrderController@list');
    Route::post('/orders/disable',                          'OrderController@disable');
    Route::get('/orders/start/{table_id}',                  'OrderController@start');
    Route::get('/orders/{order_id}',                        'OrderController@details');
    Route::post('/orders/{order_id}/paymentStore',          'OrderController@paymentStore');
    Route::get('/orders/{order_id}/close',                  'OrderController@close');
    Route::get('/orders/{order_id}/changetable',            'OrderController@changetable');
    Route::get('/orders/{order_id}/changetable/{table_id}', 'OrderController@changetableProcess');
    Route::get('/orders/{order_id}/products',               'OrderController@products');
    Route::get('/orders/{order_id}/command',                'OrderController@command');
    Route::get('/orders/{order_id}/ordertype_id/{ordertype_id}',  'OrderController@ordertype');
    Route::get('/tables',                                   'OrderController@tables');
    Route::get('/tables/{table_id}/orders',                 'OrderController@tableorder');
    Route::post('/orders/products/attach',                  'OrderController@productAttach');
    Route::post('/orders/products/detach',                  'OrderController@productDetach');

    //pedidos del cliente de la orden
    Route::get('/orders/{order_id}/clienthistory',          'OrderController@history');
    Route::get('/orders/{order_id}/repeat/{order_id_old}',  'OrderController@repeat');


    //ESTAS RUTAS NECESITAS SER COMPANY ADMIN
    Route::group(['middleware' => ['admin:companyadmin|superadmin']], function() {
        Route::get('/dashboard',                'MainController@dashboard');
        Route::get('/settings',                 'MainController@settings');
    });

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

    //MESAS
    Route::get('/deliverys/list',                        'DeliveryController@list')->name('deliverys.list');
    Route::get('/deliverys/add',                         'DeliveryController@add')->name('deliverys.add');
    Route::get('/deliverys/{delivery_id}',               'DeliveryController@details')->name('deliverys.details');
    Route::get('/deliverys/{delivery_id}/delete',        'DeliveryController@delete');
    Route::post('/deliverys/process',                    'DeliveryController@process');

    //RECETA
    Route::post('/prescriptions/store',                     'PrescriptionController@store');
    Route::get('/prescriptions/{prescription_id}',          'PrescriptionController@details');
    Route::get('/prescriptions/{prescription_id}/delete',   'PrescriptionController@delete');

    Route::get('/prescriptions/{prescription_id}/avaibleproducts/{producttype_id}',   'PrescriptionController@avaibleproducts');

    //Detalle de Receta
    Route::post('/prescriptiondetails/store',                           'PrescriptiondetailController@store');
    Route::get('/prescriptiondetails/{prescriptiondetail_id}',          'PrescriptiondetailController@select');
    Route::get('/prescriptiondetails/{prescriptiondetail_id}/delete',   'PrescriptiondetailController@delete');

    //COMPAÑIAS
    Route::group(['middleware' => ['admin:superadmin']], function(){
        route::get('/companys/list',                        'CompanyController@list')->name('companys.list');

        route::get('/companys/add',                         'CompanyController@add')->name('companys.add');
        route::get('/companys/{company_id}',                'CompanyController@details');
        
        route::get('/companys/{company_id}/delete',         'CompanyController@delete');
        route::post('/companys/store',                      'CompanyController@store');
    });

    //LOGOUT
    route::get('/app/logout','MainController@logout');
    route::post('set/company','MainController@setcompany');

    //APERTURA Y CIERRE DE CAJA
    route::get('/cashregister/form','CashregisterController@form');
    route::post('/cashregister/open','CashregisterController@open');
    route::post('/cashregister/close','CashregisterController@close');

    route::get('/cashregister/list','CashregisterController@list');
    route::get('/cashregister/{cashregister_id}','CashregisterController@details');

    route::get('test',function(){
        $tabletypes = App\Tabletype::with(['tables'=>function($query){$query->where('tables.id',1);}])->get();
        return $tabletypes;
    });

});

//rutas ajax
route::get('/ajax/generateInvoice/{order_id}','SalesHelper@generateInvoice');
route::get('/ajax/fakeDte/{order_id}','SalesHelper@fakeDte');
route::get('/ajax/printAgainInvoice/{order_id}','SalesHelper@printAgainInvoice');
route::get('/ajax/removeDte/{order_id}','SalesHelper@removeDte');



route::get('/testmail/{item_id}','OrderController@lowStockMail');


