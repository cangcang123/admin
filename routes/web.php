<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 
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

Route::get('/','HomeController@index')->name('home');
Route::get('login','LoginController@login');
Route::get('register','HomeController@register')->name('home.register');
Route::post('create','HomeController@create')->name('home.create');
// Route::prefix('shop-api')->group(function () {
//     Route::post('/login', 'LoginController@loginMobile');
//     Route::post('/check-phone', 'LoginController@checkPhone');
//     Route::post('/get-info', 'LoginController@getProfileFromToken');
//     Route::post('/register', 'LoginController@registerMobile');
//     Route::post('/update-pwd', 'LoginController@updatePassword');
//     Route::post('/reset-pwd', 'LoginController@resetPassword');
//     Route::post('/logout', 'LoginController@logoutMobile');
//     Route::post('/verify-referral', 'LoginController@verifyReferral');
//     Route::post('/verify-email', 'LoginController@verifyEmail');
// });

// Route::get('/','Controller@index')->name('index');
