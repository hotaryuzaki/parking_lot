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

Route::get('/', 'MasterSlotController@index');
Route::resource('setup-parking', 'SetupParkingController');
Route::resource('slot', 'MasterSlotController');
Route::view('transaction/checkout', 'transaction.checkout');
Route::post('transaction/out', 'TransactionController@checkout');
Route::resource('transaction', 'TransactionController');
Route::view('report', 'report.index');
Route::post('report/get', 'ReportController@getReport');
