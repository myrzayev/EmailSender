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

Route::get('/reminder',function (){
    \Illuminate\Support\Facades\Artisan::call('Reminder:Start');
});

Route::get('/','front\indexController@index')->name('index');
Route::post('/','front\indexController@store')->name('store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
