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

Route::get('api/objects', 'TObjectsController@index');

Route::get('/', function () {
    return view('front');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function(){
    return view('welcome');
});

Route::get('/app', function (){
    return view('appmap');
});

Route::resource('/tObject', 'TobjectController')->only([
    'index', 'create', 'store',
]);

Route::get('/search', 'TobjectController@search');

Route::get('/getemployees', 'EmployeeController@getEmployees')->name('datatables.getemployees');
Route::resource('employee', 'EmployeeController');
Route::get('/getobject', 'TobjectController@getObjects')->name('datatables.getObjects');
Route::resource('object', 'TobjectController');


//Route::get('/tObject/{tObject}', 'TObjectsController@show')->name('show');
//Route::get('/tObject/{tObject}/edit', 'TObjectsController@edit')->name('edit');

Route::get('/map', function(){
    return view('front');


});






