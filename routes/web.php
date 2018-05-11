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
Route::get('/register-asset', 'RegisterAssetController@ShowAssetRegister')->name('get.asset');


/*
*  Register Assets 
*/
Route::post('/post-register', 'RegisterAssetController@RegisterAsset')->name('register.asset');

/*
*  Register Assets 
*/
Route::get('/allocate-asset/{id}', 'ShowAssetsController@showAsset')->name('show.asset');

/*
*  Post Allocation
*/
Route::post('/post-asset/', 'AllocateAssetsController@AllocateAsset')

->name('asset.allocate');


/*
*  Post Allocation
*/
Route::post('/apply-alloc/', 'AssetApplicationController@Application')

->name('apply.alloc');

/*
*  Post Allocation
*/
Route::get('/allocations/', 'ShowAssetsController@showAllocations')

		->name('allocations');



