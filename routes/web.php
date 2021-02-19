<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create sometthing great!
|
*/

Route::get('/', function () {
    return view('/auth/login');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('/clients', 'ClientController');
	Route::resource('/items', 'ItemController');
    Route::get('invoices/{type?}', ["uses" => "InvoiceController@index", "as" => "invoices.index"])->where('type', '(paid|unpaid)');
	Route::resource('/invoices', 'InvoiceController')->except(['index']);

	Route::get('/invoiceData', 'HomeController@getMonthlyInvoiceData');
	Route::get('/invoices/{id}/items', 'InvoiceController@getInvoiceItems');
});

Auth::routes();

Route::get('/home', 'HomeController@home')->name('home');
Route::get('/account','HomeController@account')->name('account');



















