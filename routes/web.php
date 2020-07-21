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

Route::group(['middleware' => 'auth'], function() {
    
    // Route::get('/', function () {
    //     return view('welcome');
    // });
    
  Route::get('/', 'HomeController@index')->name('admin.index');

  //Doctor
  Route::get('/doctor/all', 'DoctorController@listDoctors')->name('admin.list.doctor');
  Route::post('/doctor/save', 'DoctorController@stroeDoctor')->name('admin.save.doctor');
  Route::get('/doctor/edit/{id}', 'DoctorController@editDoctor')->name('admin.edit.doctor');
  Route::post('/doctor/update', 'DoctorController@updateDoctor')->name('admin.update.doctor');
  Route::get('/doctor/delete/{id}', 'DoctorController@deleteDoctor')->name('admin.delete.doctor');
   

  //Invoice
  Route::get('/invoice/all', 'InvoiceController@listInvoice')->name('admin.list.invoice');
  Route::get('/invoice/create', 'InvoiceController@createInvoice')->name('admin.create.invoice');
  Route::post('/invoice/store', 'InvoiceController@store')->name('admin.store.invoice');
  Route::get('/invoice/items/{id}', 'InvoiceController@item')->name('admin.item.invoice');
  Route::get('/invoice/delete/{id}', 'InvoiceController@deleteInvoice')->name('admin.delete.invoice');
});


Auth::routes();




