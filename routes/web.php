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
    return redirect('login');
})->name('/');
Route::post('/request', 'HomeController@request')->name('request');
Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Auth::routes();

Route::get('/home', 'CarController@index')->name('home');
Route::get('/update_salary/{salary_id}/{column}/{value}', 'HomeController@update_salary')->name('update_salary');

Route::get('/mark', 'MarkController@index')->name('mark');
Route::get('/mark/delete/{id}', 'MarkController@destroy');
Route::post('/addmark','MarkController@store');
Route::post('/updatemark','MarkController@update');
Route::get('/markfill/{id?}',function($id = 0){
    $dt=App\Mark::where('mark_id','=',$id)->get();
    return $dt;
});

Route::get('/model', 'ModelController@index')->name('model');
Route::get('/model/delete/{id}', 'ModelController@destroy');
Route::post('/addmodel','ModelController@store');
Route::post('/updatemodel','ModelController@update');
Route::get('/modelfill/{id?}',function($id = 0){
    $dt=App\CModel::where('mark_id','=',$id)->get();
    return $dt;
});

Route::get('/car', 'CarController@index')->name('car');
Route::get('/car/delete/{id}', 'CarController@destroy');
Route::post('/addcar','CarController@store');
Route::post('/updatecar','CarController@update');
Route::get('/carfill/{id?}',function($id = 0){
    $dt=DB::table('v_cars')->where('carid','=',$id)->get();
    return $dt;
});


Route::get('/product', 'CarController@index')->name('car');
Route::get('/product/delete/{id}', 'CarController@destroy');
Route::post('/addproduct','CarController@store');
Route::post('/updateproduct','CarController@update');
Route::get('/productfill/{id?}',function($id = 0){
    $dt=DB::table('v_products')->where('carid','=',$id)->get();
    return $dt;
});

Route::get('/driver', 'DriverController@index')->name('driver');
Route::get('/driver/delete/{id}', 'DriverController@destroy');
Route::post('/adddriver','DriverController@store');
Route::post('/updatedriver','DriverController@update');
Route::get('/driverfill/{id?}',function($id = 0){
    $dt=DB::table('CONST_DRIVER')->where('driver_id','=',$id)->get();
    return $dt;
});

Route::get('/cardriver/delete/{id}', 'CarController@destroycardriver');
Route::post('/addcardriver','CarController@storecardriver');
Route::post('/updatecardriver','CarController@updatecardriver');
Route::get('/cardriverfill/{id?}',function($id = 0){
    $dt=DB::table('V_CAR_DRIVER')->where('cd_id','=',$id)->get();
    return $dt;
});
Route::get('/cardriversfill/{id?}',function($id = 0){
    $dt=DB::table('V_CAR_DRIVER')->where('car_id','=',$id)->get();
    return $dt;
});

Route::get('/carproduct/delete/{id}', 'CarController@destroycarproduct');
Route::post('/addcarproduct','CarController@storecarproduct');
Route::post('/updatecarproduct','CarController@updatecarproduct');
Route::get('/carproductfill/{id?}',function($id = 0){
    $dt=DB::table('V_CAR_PRODUCT')->where('cp_id','=',$id)->get();
    return $dt;
});
Route::get('/carproductsfill/{id?}',function($id = 0){
    $dt=DB::table('V_CAR_PRODUCT')->where('car_id','=',$id)->get();
    return $dt;
});

Route::get('/carrepair/delete/{id}', 'CarController@destroycarrepair');
Route::post('/addcarrepair','CarController@storecarrepair');
Route::post('/updatecarrepairproduct','CarController@updatecarrepair');
Route::get('/carrepairfill/{id?}',function($id = 0){
    $dt=DB::table('V_CAR_REPAIR')->where('cr_id','=',$id)->get();
    return $dt;
});
Route::get('/carrepairsfill/{id?}',function($id = 0){
    $dt=DB::table('V_CAR_REPAIR')->where('car_id','=',$id)->get();
    return $dt;
});