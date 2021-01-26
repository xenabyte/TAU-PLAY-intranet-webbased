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

Route::get('/', 'StreamController@index')->name('index');
Route::get('/stream/{id}', 'StreamController@streamChannel')->name('stream.channel');


Auth::routes([

    'register' => false, // Register Routes...

    'verify' => false, // Email Verification Routes...
    'login' => false,
]);

Route::get('/admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login')->name('login.attempt')->uses('Auth\LoginController@login');
Route::post('/admin/save_profile', 'HomeController@saveProfile')->name('save.profile');

Route::get('/admin/dashboard', 'HomeController@index')->name('home');
Route::get('/admin/categories', 'HomeController@category')->name('category');
Route::get('/admin/channels', 'HomeController@Channels')->name('channels');

Route::post('/admin/new_channel', 'HomeController@newChannel')->name('add.channel');
Route::post('/admin//save_channel', 'HomeController@saveChannel')->name('save.channel');
Route::get('/admin/delete_channel/{id}', 'HomeController@deleteChannel')->name('delete.channel');
Route::get('/admin/change_channel_status/{id}', 'HomeController@changeChannelStatus')->name('update.channel');

Route::post('/admin/new_category', 'HomeController@newCategory')->name('add.category');
Route::post('/admin//save_category', 'HomeController@saveCategory')->name('save.category');
Route::get('/admin/change_category_status/{id}', 'HomeController@changeCategoryStatus')->name('update.category');



