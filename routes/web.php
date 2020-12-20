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
Route::get('/doctor/send-messages', 'App\Http\Controllers\Doctor\DoctorController@sendMessages')->name('doc-send-messages')->middleware('doctor');
Route::post('/doctor/send-messages-action', 'App\Http\Controllers\Doctor\DoctorController@sendMessagesAction')->middleware('doctor');
Route::get('/doctor/inbox', 'App\Http\Controllers\Doctor\DoctorController@inbox')->name('doc-inbox')->middleware('doctor');
Route::post('/doctor/messages-read', 'App\Http\Controllers\Doctor\DoctorController@readMessageAction')->middleware('doctor');
Route::post('/doctor/messages-delete', 'App\Http\Controllers\Doctor\DoctorController@deleteMessageAction')->middleware('doctor');

/* @@ sister controllers @@ */
Route::get('/sister/dashboard', 'App\Http\Controllers\Sister\SisterController@index')->name('sister')->middleware('sister');
Route::get('/sister/send-messages', 'App\Http\Controllers\Sister\SisterController@sendMessages')->name('sis-send-messages')->middleware('sister');
Route::post('/sister/send-messages-action', 'App\Http\Controllers\Sister\SisterController@sendMessagesAction')->middleware('sister');
Route::get('/sister/inbox', 'App\Http\Controllers\Sister\SisterController@inbox')->name('sis-inbox')->middleware('sister');
Route::post('/sister/messages-read', 'App\Http\Controllers\Sister\SisterController@readMessageAction')->middleware('sister');
Route::post('/sister/messages-delete', 'App\Http\Controllers\Sister\SisterController@deleteMessageAction')->middleware('sister');

/* @@ midwife controllers @@ */
Route::get('/midwife/dashboard', 'App\Http\Controllers\Midwife\MidwifeController@index')->name('midwife')->middleware('midwife');
Route::post('/midwife/baby-select', 'App\Http\Controllers\Midwife\MidwifeController@babySelect')->middleware('midwife');
Route::get('/midwife/vaccinations-mark', 'App\Http\Controllers\Midwife\MidwifeController@vaccMark')->name('vacc-mark')->middleware('midwife');
Route::post('/midwife/vaccinations-mark-action', 'App\Http\Controllers\Midwife\MidwifeController@vaccMarkAction')->middleware('midwife');
Route::post('/midwife/vaccinations-set-date-action', 'App\Http\Controllers\Midwife\MidwifeController@vaccSetDateAction')->middleware('midwife');
Route::get('/midwife/add-babies', 'App\Http\Controllers\Midwife\MidwifeController@addBabies')->name('add-babies')->middleware('midwife');
Route::post('/midwife/baby-register', 'App\Http\Controllers\Midwife\MidwifeController@babyRegister')->middleware('midwife');
Route::get('/midwife/baby-register-with-mother', 'App\Http\Controllers\Midwife\MidwifeController@babyRegisterWithMother')->middleware('midwife');
Route::get('/midwife/baby-registration-reset', 'App\Http\Controllers\Midwife\MidwifeController@babyRegistrationReset')->middleware('midwife'); // Baby register form session values reset
Route::post('/midwife/baby-register-action', 'App\Http\Controllers\Midwife\MidwifeController@babyRegisterAction')->middleware('midwife');
Route::get('/midwife/view-babies', 'App\Http\Controllers\Midwife\MidwifeController@viewBabies')->name('view-babies')->middleware('midwife');
Route::post('/midwife/inactivate-baby-action', 'App\Http\Controllers\Midwife\MidwifeController@inactivateBabyAction')->middleware('midwife');
Route::get('/midwife/send-messages', 'App\Http\Controllers\Midwife\MidwifeController@sendMessages')->name('mid-send-messages')->middleware('midwife');
Route::post('/midwife/send-messages-action', 'App\Http\Controllers\Midwife\MidwifeController@sendMessagesAction')->middleware('midwife');
Route::get('/midwife/inbox', 'App\Http\Controllers\Midwife\MidwifeController@inbox')->name('mid-inbox')->middleware('midwife');
Route::post('/midwife/messages-read', 'App\Http\Controllers\Midwife\MidwifeController@readMessageAction')->middleware('midwife');
Route::post('/midwife/messages-delete', 'App\Http\Controllers\Midwife\MidwifeController@deleteMessageAction')->middleware('midwife');

/* @@ baby controllers @@ */
Route::get('/baby/select', 'App\Http\Controllers\Baby\BabyController@select')->name('baby-select')->middleware('readonly');
Route::post('/baby/change', 'App\Http\Controllers\Baby\BabyController@change')->middleware('readonly');
Route::get('/baby/dashboard', 'App\Http\Controllers\Baby\BabyController@index')->name('baby')->middleware('readonly');
Route::get('/baby/charts-height', 'App\Http\Controllers\Baby\BabyController@chartsHeight')->name('charts-height')->middleware('readonly');
Route::get('/baby/charts-weight', 'App\Http\Controllers\Baby\BabyController@chartsWeight')->name('charts-weight')->middleware('readonly');
Route::get('/baby/charts-bmi', 'App\Http\Controllers\Baby\BabyController@chartsBmi')->name('charts-bmi')->middleware('readonly');
Route::get('/baby/vaccinations-view', 'App\Http\Controllers\Baby\BabyController@vaccView')->name('vacc-view')->middleware('mother');

/* @@ validation routes @@ */
Route::get('/baby-id-validation', 'App\Http\Controllers\ValidationController@BabyIdValidation');
Route::get('/mother-nic-validation', 'App\Http\Controllers\ValidationController@MotherNicValidation');
Route::get('/mother-tpnbr-validation', 'App\Http\Controllers\ValidationController@MotherTpNbrValidation');
Route::get('/mother-email-validation', 'App\Http\Controllers\ValidationController@MotherEmailValidation');