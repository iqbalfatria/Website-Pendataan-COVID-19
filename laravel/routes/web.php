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
Route::get('/pendataan/index', 'PendataanController@index')
->name('pendataan.index');

Route::get('welcome', 'PendataanController@welcome')
->name('welcome');

Route::post('/pendataan', 'PendataanController@store')
->name('pendataan.store');

Route::get('/data_pengunjung/index', 'DataController@index')
->name('data_pengunjung.index');


//----------

Route::get('/login', 'AdminController@index')->name('login.index');
Route::get('/logout', 'AdminController@logout')->name('login.logout');
Route::post('/login', 'AdminController@process')->name('login.process');

//Route::get('/daftar/daftar', 'AdminController@indexx')->name('daftar.daftar');
//Route::post('/daftar/daftar', 'AdminController@store')->name('daftar.store');

//---------pendataan

Route::get('/pendataan/{pendataan}', 'PendataanController@show')
->name('pendataan.show')->middleware('login_auth');;

Route::get('/pendataan/{pendataan}/edit', 'PendataanController@edit')
->name('pendataan.edit')->middleware('login_auth');;

Route::patch('/pendataan/{pendataan}', 'PendataanController@update')
->name('pendataan.update')->middleware('login_auth');;

Route::delete('/pendataan/{pendataan}', 'PendataanController@destroy')
->name('pendataan.destroy')->middleware('login_auth');
//----------------------------------------------------------admin

Route::get('/admin/data/create', 'AdminDataController@create')->name('admin.data.create')->middleware('admin_auth');
Route::get('/admin/data/create2', 'AdminDataController@create2')->name('admin.data.create2')->middleware('admin_auth');

Route::get('/admin/data/index', 'AdminDataController@index')->name('admin.data.index')->middleware('admin_auth');
Route::get('/admin/data/pendataan/pendataan', 'AdminDataController@pendataan')->name('admin.data.pendataan.pendataan')->middleware('admin_auth');
Route::get('/admin/data/users/users', 'AdminDataController@users')->name('admin.data.users.users')->middleware('admin_auth');

Route::post('/admin/data/create', 'AdminDataController@store')->name('admin.data.store')->middleware('admin_auth');
Route::post('/admin/data/create2', 'AdminDataController@store2')->name('admin.data.store2')->middleware('admin_auth');


Route::get('/admin/data/pendataan/{pendataan}', 'AdminDataController@show')->name('admin.data.show')->middleware('admin_auth');
Route::get('/admin/data/users/{user}', 'AdminDataController@show2')->name('admin.data.show2')->middleware('admin_auth');


Route::get('/admin/data/pendataan/{pendataan}/edit', 'AdminDataController@edit')->name('admin.data.edit')->middleware('admin_auth');
Route::get('/admin/data/users/{user}/edit', 'AdminDataController@edit2')->name('admin.data.edit2')->middleware('admin_auth');

Route::patch('/admin/data/pendataan/{pendataan}', 'AdminDataController@update')->name('admin.data.update')->middleware('admin_auth');
Route::patch('/admin/data/users/{user}', 'AdminDataController@update2')->name('admin.data.update2')->middleware('admin_auth');

Route::delete('/admin/data/pendataan/{pendataan}', 'AdminDataController@destroy')->name('admin.data.destroy')->middleware('admin_auth');
Route::delete('/admin/data/users/{user}', 'AdminDataController@destroy2')->name('admin.data.destroy2')->middleware('admin_auth');

//----------------------user
Route::get('/user/data/create', 'UserDataController@create')->name('user.data.create')->middleware('user_auth');

Route::get('/user/data/index/{user}', 'UserDataController@index')->name('user.data.index')->middleware('user_auth');

Route::post('/user/data', 'UserDataController@store')->name('user.data.store')->middleware('user_auth');

Route::get('/user/data/{user}', 'UserDataController@show')->name('user.data.show')->middleware('user_auth');



Route::get('/user/data/{user}/edit', 'UserDataController@edit')->name('user.data.edit')->middleware('user_auth');

Route::patch('/user/data/{user}', 'UserDataController@update')->name('user.data.update')->middleware('user_auth');

Route::delete('/user/data/{user}', 'UserDataController@destroy')->name('user.data.destroy')->middleware('user_auth');

//-----------------------

//Route::get('resizeImage', 'ImageController@resizeImage');
//Route::post('resizeImagePost', 'ImageController@resizeImagePost')->name('resizeImagePost');

//------------------email
Route::get('/admin/data/{pendataan}/move', 'AdminDataController@moving')->name('admin.data.moving');

//------------------tentang covid
Route::get('/tentang/tentang', 'ShowController@tentang')->name('tentang.tenntang');
//-------------------hubungi petugas
Route::get('/hubungi/hubungi', 'ShowController@hubungi')->name('hubungi.hubungi');



