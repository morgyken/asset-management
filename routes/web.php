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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
*  show all assets 
*/
Route::get('/all-assets', 'ShowAssetsController@index')->name('all.assets');


/*
*  REgister Assets 
*/
Route::get('/register-asset', 'RegisterAssetController@ShowAssetRegister')->name('register.asset');


/*
*  Register Assets 
*/
Route::post('/post-register', 'RegisterAssetController@RegisterAsset')->name('register.asset');