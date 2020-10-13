<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::post('/authentication', 'App\Http\Controllers\LoginController@login');

/* @@ admin controllers @@ */
Route::get('/admin/dashboard', 'App\Http\Controllers\Admin\AdminController@index')->name('admin')->middleware('admin');

/* @@ doctor controllers @@ */
Route::get('/doctor/dashboard', 'App\Http\Controllers\Doctor\DoctorController@index')->name('doctor')->middleware('doctor');

/* @@ sister controllers @@ */
Route::get('/sister/dashboard', 'App\Http\Controllers\Sister\SisterController@index')->name('sister')->middleware('sister');

/* @@ midwife controllers @@ */
Route::get('/midwife/dashboard', 'App\Http\Controllers\Midwife\MidwifeController@index')->name('midwife')->middleware('midwife');

/* @@ baby controllers @@ */
Route::get('/baby/select', 'App\Http\Controllers\Baby\BabyController@select')->name('baby-select')->middleware('mother');
Route::post('/baby/change', 'App\Http\Controllers\Baby\BabyController@change')->middleware('mother');
Route::get('/baby/dashboard', 'App\Http\Controllers\Baby\BabyController@index')->name('baby')->middleware('mother');
Route::get('/baby/charts-height', 'App\Http\Controllers\Baby\BabyController@chartsHeight')->name('charts-height')->middleware('mother');