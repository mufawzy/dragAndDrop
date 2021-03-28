<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// GET|HEAD  |  password/confirm  |  password.confirm  |  Controllers\Auth\ConfirmPasswordController@showConfirmForm
// POST      |  password/confirm  |                    |  Controllers\Auth\ConfirmPasswordController@confirm


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    
    Route::group(['namespace' => 'Backend'], function() {
        Route::get('home', 'HomeController@index')->name('home');
    });

    Route::group(['namespace' => 'Backend\Auth'], function() {
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login')->name('login.post');
        
        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register')->name('register.post');
        
        Route::post('logout', 'LoginController@logout')->name('logout');

        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        
        Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    });
});
