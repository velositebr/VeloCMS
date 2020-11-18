<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

/* Frontend Routes */
Route::get('/', 'IndexController@index')->name('home');
Route::get('/sobre', 'SobreController@content')->name('sobre');
Route::get('/agenda', 'AgendaController@content')->name('agenda');
//Route::get('/discografia', 'DiscografiaController@content')->name('discografia');
//Route::get('/videos', 'VideosController@content')->name('videos');
Route::get('/fotos', 'FotosController@content')->name('fotos');
Route::get('/contato', 'ContatoController@content')->name('contato');
Route::post('/enviar', 'ContactController@sendMessage');

Route::get('/admin', function () {
    return redirect('backend/dashboard');
});

Auth::routes();

Route::namespace('Backend')->prefix('backend')->name('backend.')->group(function(){
    Route::resource('/dashboard', 'DashboardController');
});

Route::namespace('Backend')->prefix('backend')->name('backend.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController');
});

Route::namespace('Backend')->prefix('backend')->name('backend.')->middleware('can:edit-user-profile')->group(function(){
    Route::resource('/profile', 'ProfilesController');
});

Route::namespace('Backend')->prefix('backend')->name('backend.')->middleware('can:manage-pages')->group(function(){
    Route::resource('/pages', 'PagesController');
});

Route::namespace('Backend')->prefix('backend')->name('backend.')->middleware('can:manage-pages')->group(function(){
    Route::resource('/banners', 'BannersController');
});

Route::namespace('Backend')->prefix('backend')->name('backend.')->middleware('can:manage-albums')->group(function(){
    Route::resource('/albums', 'AlbumsController');
});

Route::namespace('Backend')->prefix('backend')->name('backend.')->middleware('can:manage-events')->group(function(){
    Route::resource('/events', 'EventsController');
});

Route::namespace('Backend')->prefix('backend')->name('backend.')->middleware('can:manage-files')->group(function(){
    Route::resource('/files', 'FilesController');
});

Route::namespace('Backend')->prefix('backend')->name('backend.')->middleware('can:manage-settings')->group(function(){
    Route::resource('/settings', 'SettingsController');
});

Route::namespace('Backend')->prefix('backend')->name('backend.')->middleware('can:manage-contacts')->group(function(){
    Route::resource('/contacts', 'ContactsController');
});

Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');
