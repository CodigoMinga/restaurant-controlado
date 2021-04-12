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

    //ORDENES
    Route::get('/tables',                       'OrderController@tables');
    Route::get('/tableorder/{table_id}',        'OrderController@tableorder');
    Route::get('/orderstart/{table_id}',        'OrderController@orderstart');
    Route::get('/productselection/{order_id}',  'OrderController@productselection');
    Route::post('/productattach',               'OrderController@productattach');
    Route::get('/orderdetails/{order_id}',      'OrderController@orderdetails');
    
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

    //PRODUCTOS
    Route::get('/app/products/list',                        'ProductController@list')->name('products.list');
    Route::get('/app/products/add',                         'ProductController@add')->name('products.add');
    Route::post('/app/products/add/process',                'ProductController@addProcess');
    Route::get('/app/products/{product_id}',                'ProductController@details')->name('products.details');
    Route::get('/app/products/{product_id}/prescriptions/{prescription_id}/details', 'ProductController@details');
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

    //COMPAÑIAS
    route::get('/app/companys/add',                         'CompanyController@add')->name('companys.add');
    route::post('/app/companys/add/process',                'CompanyController@addProcess');
    route::get('/app/companys/list',                        'CompanyController@list')->name('companys.list');
    route::get('/app/companys/{company_id}',                'CompanyController@details');
    route::post('/app/companys/{company_id}/edit/process',  'CompanyController@editprocess');
    route::get('/app/companys/{company_id}/delete',         'CompanyController@delete');
    
    //RECETA
    Route::get('/app/products/{product_id}/prescriptions/add',             'PrescriptionController@add')->name('prescriptions.add');
    Route::post('/app/products/{product_id}/prescriptions/add/process',    'PrescriptionController@addProcess');
    route::get('app/prescriptions/list',                                   'PrescriptionController@list')->name('prescriptions.list');
    route::get('/app/products/{product_id}/prescriptions/details',         'PrescriptionController@details')->name('prescriptions.details');
    route::post('app/prescriptions/{prescription_id}/edit/process',        'PrescriptionController@editprocess')->name('prescriptions.editprocess');
    route::get('app/prescriptions/{prescription_id}/delete',               'PrescriptionController@delete')->name('prescriptions.delete');
    //Detalles de Receta 
    route::get('/app/products/{product_id}/prescriptiondetails/details',         'PrescriptiondetailController@details')->name('prescriptiondetails.details');

    //Receta
    Route::post('/prescriptions/create',  'PrescriptionController@create');

    //Detalle de Receta
    Route::post('/prescriptiondetails/create',                          'PrescriptiondetailController@create');
    Route::post('/prescriptiondetails/update',                          'PrescriptiondetailController@update');
    Route::get('/prescriptiondetails/select/{prescriptiondetail_id}',   'PrescriptiondetailController@select');

    
    Route::get('prueba',function(){
        //1 Compañias a la que pertenece el usuario
        $companies_id = Auth::user()->companies()->pluck('company_id')->toArray();

        //Consultar a la tabla company_user las id de los usuarios que pertenecen a las compañias dichas
        $users_id= DB::table('company_user')->whereIn('company_id',$companies_id)->pluck('user_id')->toArray();

        //buscar los usuarios con las id obtenidas
        $users = App\User::WhereIn('id',$users_id)->get();

        //Esto es solo para mostrar
        dd($users);
    });

});

//rutas ajax
route::get('/ajax/generateInvoice/{order_id}','SalesHelper@generateInvoice');






