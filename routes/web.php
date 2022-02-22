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
    return view('auth/login');
})->name('welcome');

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/form_1', 'Form_1_Controller@index')->name('form_1');
Route::get('/form_2', 'Form_2_Controller@index')->name('form_2');
Route::get('/form_3', 'Form_3_Controller@index')->name('form_3');
Route::get('/register', 'HomeController@register')->name('register');

Route::post('form_1_remark_status', 'Form_1_Controller@remark_status')->name('remark_status');
Route::post('form_1_remark_status_save', 'Form_1_Controller@remark_status_save')->name('remark_status_save');


Route::get('/confirmed', function () {
    return 'password confirmed';
})->middleware(['auth', 'password.confirm']);

Route::get('/verified', function () {
    return 'email verified';
})->middleware('verified');


/// admin Routing ///

Route::group(['prefix' => '/admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::get('/', function () {
        return view('admin.auth.login');
    })->name('welcome');
    
    Auth::routes(['verify' => true]);
    
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/register', 'HomeController@register')->name('register');
    Route::post('save_data', 'SaveController@index')->name('save');
    Route::post('delete_data', 'SaveController@delete')->name('delete');
    Route::post('select_data', 'SaveController@select')->name('select');
    Route::post('update_data', 'SaveController@update')->name('update');

    Route::get('/confirmed', function () {
        return 'password confirmed';
    })->middleware(['auth:admin-web', 'password.confirm:admin.password.confirm']);
    
    Route::get('/verified', function () {
        return 'email verified';
    })->middleware('verified:admin.verification.notice,admin-web');

});
