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
    if(Auth::check()) return redirect()->route('home');
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('expense', 'ExpenseController@index')->name('expense');
Route::post('expense', 'ExpenseController@store');