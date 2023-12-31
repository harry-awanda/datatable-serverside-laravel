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

Route::get('dashboard', 'App\Http\Controllers\dashboardController@index')->name('dashboard');
Route::resource('students', 'App\Http\Controllers\studentController');
Route::get('json', 'App\Http\Controllers\dashboardController@json')->name('json');
Route::delete('deleteALL', 'App\Http\Controllers\dashboardController@deleteALL')->name('students.deleteALL');
Route::post('updateALL', 'App\Http\Controllers\dashboardController@updateALL')->name('students.updateALL');