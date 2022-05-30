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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'active_check'], function () {
	Route::get('/', 'HomeController@index')->name('home');

	Route::group(['namespace' => 'Master'], function () {
		Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
		Route::post('/storestore', 'DashboardController@store')->name('storestore');
		Route::resource('users', 'UserController');
		Route::get('/password-reset/{id}', 'UserController@password_reset')->name('user.password-reset');
		Route::put('/password-reset-update/{id}', 'UserController@password_reset_update')->name('user.password-reset.update');
		Route::resource('roles', 'RoleController');
		Route::resource('categories', 'CategoryController');
		Route::resource('grades', 'GradeController');
		Route::resource('discount-events', 'DiscountEventController');
		Route::get('/qr-event/print/{id}', 'DiscountEventController@print')->name('qrevent.print');
		Route::resource('brands', 'BrandController');
		Route::resource('customers', 'CustomerController');
		Route::get('/customers-import', 'CustomerController@import')->name('customers.import');
		Route::post('/customers-import-store', 'CustomerController@import_store')->name('customers.import.store');

		Route::resource('cashiers', 'CashierController');
		Route::get('/cashiers-import', 'CashierController@import')->name('cashiers.import');
		Route::post('/cashiers-import-store', 'CashierController@import_store')->name('cashiers.import.store');

		Route::get('/items', 'ItemController@index')->name('items.index');
		Route::get('/items/{id}/edit', 'ItemController@edit')->name('items.edit');
		Route::put('/items/{id}', 'ItemController@update')->name('items.update');
		Route::delete('/items/{id}', 'ItemController@destroy')->name('items.delete');
		Route::get('/items/import', 'ItemController@import')->name('items.import');
		Route::post('/items/store', 'ItemController@store')->name('items.store');
		Route::get('/items/print', 'ItemController@print')->name('items.print');
		Route::get('/items/print-preview', 'ItemController@print_preview')->name('items.print-preview');
	});

	Route::group(['prefix' => 'generate-qrcode'], function () {
		Route::get('/index', 'GenerateQrCodeController@index')->name('qrcode.generate');
		Route::get('/print', 'GenerateQrCodeController@print')->name('qrcode.print');
	});

	Route::group(['prefix' => 'quality-control'], function () {
		Route::get('/index', 'QualityControlController@index')->name('qc.index');
		Route::get('/scan/{id}', 'QualityControlController@scan')->name('qc.scan');
		Route::get('/create-item', 'QualityControlController@create')->name('qc.create');
		Route::post('/store-item', 'QualityControlController@store')->name('qc.store');
		Route::post('/check-item', 'QualityControlController@qr_store')->name('qr.store');
	});


	Route::group(['prefix' => 'cashier'], function () {
		Route::get('/index', 'CashierController@index')->name('cashier.index');
		Route::get('/create', 'CashierController@create')->name('cashier.create');
		Route::post('/store', 'CashierController@store')->name('cashier.store');
		Route::get('/note/{invoice_id}', 'CashierController@note')->name('cashier.note');
		Route::post('/get-item', 'CashierController@get_item')->name('item.get');
		Route::post('/get-customer', 'CashierController@get_customer')->name('customer.get');
	});

	Route::group(['prefix' => 'invoices'], function () {
		Route::resource('invoices', 'InvoiceController');
		Route::resource('invoices-report', 'ReportInvoiceController');
		Route::get('invoices-report-customer', 'ReportInvoiceController@print_report_invoice_customer')->name('print.report-invoices-customer');
		Route::get('invoices-report-item', 'ReportInvoiceController@print_report_invoice_item')->name('print.report-invoices-item');
	});

	Route::get('/scan-me', 'ScanMeController@index')->name('scan.me');
	Route::get('/scan-me/{code}', 'ScanMeController@redirect')->name('scan.me.redirect');
	Route::post('/qr-check', 'ScanMeController@qr_check')->name('qr.check');


});

Route::group(['prefix' => 'price'], function () {
	Route::get('/{id}', 'PriceController@index')->name('sales.show');
});
Route::get('/note/{uuid}', 'CustomerInvoiceController@index');