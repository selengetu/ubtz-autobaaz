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