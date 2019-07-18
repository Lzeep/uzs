<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('subjects/create', 'API\SubjectController@create')->name('subjects.create');

Route::get('subjects/{subject}/edit', 'API\SubjectController@edit')->name('subjects.edit');


Route::apiResource('subjects', 'API\SubjectController');

Route::apiResource('mtu', 'API\MtuController');

Route::apiResource('violation', 'API\ViolationController');

Route::apiResource('result', 'API\ResultController');

Route::apiResource('type', 'API\TypeController');

Route::apiResource('employee', 'API\EmployeeController');





