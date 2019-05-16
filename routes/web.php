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

Route::get('/home', function(){
    return view('home');
});

Route::get('/app', function (){
    return view('appmap');
});

Route::resource('/tObject', 'TobjectController')->only([
    'index', 'create', 'store', 'edit',
]);



Route::get('/search', 'TobjectController@search');

Route::get('/getemployees', 'EmployeeController@getEmployees')->name('datatables.getemployees');
Route::resource('employee', 'EmployeeController');

Route::get('/getobject', 'TobjectController@getObjects')->name('datatables.getObjects');
Route::resource('object', 'TobjectController');

Route::get('/getsubject', 'SubjectController@getSubjects')->name('datatables.getSubjects');
Route::resource('subject', 'SubjectController')->only([
    'index', 'create', 'store',

]);

route::get('getEdit', 'SubjectController@getAddEditRemoveColumnData')->name('datatables.getAddEditRemoveColumnData');

Route::get('subject/{id}', 'SubjectController@edit');

Route::get('/subject/pdfexport', 'SubjectController@pdfexport');



Route::get('/yandex', function (){
    return view('yandex');
});

//Route::get('/tObject/{tObject}', 'TObjectsController@show')->name('show');
//Route::get('/tObject/{tObject}/edit', 'TObjectsController@edit')->name('edit');

Route::get('/map', function(){
    return view('front');


});






