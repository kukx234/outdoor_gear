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
})->middleware('check_role');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Admin stranice
Route::prefix('admin')->middleware(['auth', 'check_role'])->group(function ()
{   
    Route::name('admin-home')->get('home', 'Admin\HomeController@index');
});
