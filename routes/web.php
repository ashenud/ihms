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
Route::post('/doctor/baby-select', 'App\Http\Controllers\Doctor\DoctorController@babySelect')->middleware('doctor');
Route::get('/doctor/vaccinations-permission', 'App\Http\Controllers\Doctor\DoctorController@vaccPermission')->name('vacc-permission')->middleware('doctor');
Route::post('/doctor/vaccinations-permission-action', 'App\Http\Controllers\Doctor\DoctorController@vaccPermissionAction')->middleware('doctor');
Route::get('/doctor/child-health-note', 'App\Http\Controllers\Doctor\DoctorController@childHealthNote')->name('child-helth-note')->middleware('doctor');

/* @@ sister controllers @@ */
Route::get('/sister/dashboard', 'App\Http\Controllers\Sister\SisterController@index')->name('sister')->middleware('sister');

/* @@ midwife controllers @@ */
Route::get('/midwife/dashboard', 'App\Http\Controllers\Midwife\MidwifeController@index')->name('midwife')->middleware('midwife');
Route::post('/midwife/baby-select', 'App\Http\Controllers\Midwife\MidwifeController@babySelect')->middleware('midwife');
Route::get('/midwife/vaccinations-mark', 'App\Http\Controllers\Midwife\MidwifeController@vaccMark')->name('vacc-mark')->middleware('midwife');
Route::post('/midwife/vaccinations-mark-action', 'App\Http\Controllers\Midwife\MidwifeController@vaccMarkAction')->middleware('midwife');
Route::post('/midwife/vaccinations-set-date-action', 'App\Http\Controllers\Midwife\MidwifeController@vaccSetDateAction')->middleware('midwife');

/* @@ baby controllers @@ */
Route::get('/baby/select', 'App\Http\Controllers\Baby\BabyController@select')->name('baby-select')->middleware('readonly');
Route::post('/baby/change', 'App\Http\Controllers\Baby\BabyController@change')->middleware('readonly');
Route::get('/baby/dashboard', 'App\Http\Controllers\Baby\BabyController@index')->name('baby')->middleware('readonly');
Route::get('/baby/charts-height', 'App\Http\Controllers\Baby\BabyController@chartsHeight')->name('charts-height')->middleware('readonly');
Route::get('/baby/charts-weight', 'App\Http\Controllers\Baby\BabyController@chartsWeight')->name('charts-weight')->middleware('readonly');
Route::get('/baby/charts-bmi', 'App\Http\Controllers\Baby\BabyController@chartsBmi')->name('charts-bmi')->middleware('readonly');
Route::get('/baby/vaccinations-view', 'App\Http\Controllers\Baby\BabyController@vaccView')->name('vacc-view')->middleware('mother');