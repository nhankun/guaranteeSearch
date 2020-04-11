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

Route::get('/search', 'SearchController@index');

Route::middleware('isAdmin')->group(function (){
    Route::get('/admin', function () {
        return view('admin.dashboard.dashboard');
    });

    Route::namespace('admin')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::resource('users', 'UserController');
            Route::resource('services', 'ServiceControlller');
            Route::resource('doctors', 'DoctorController');
            Route::resource('gcs', 'guaranteeCertificateController');
        });
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
