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

Route::group(['middleware'=> ['auth']],function(){
    Route::get('/user','DemoController@userDemo')->name('user');
    Route::get('/permission-denied','DemoController@permissionDenied')->name('nopermission');

    Route::group(['middleware'=> ['admin']],function(){
    Route::get('/admin','adminController@index')->name('admin');
   Route::get('/admin/remove-admin/{id}','AdminController@removeAdmin');
   Route::get('/admin/give-admin/{id}','AdminController@giveAdmin');

});

});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/imageupload', 'ImageController@showUpload');

//Route::get('/admin/remove-admin/{$user->id}','AdminController@removeAdmin');