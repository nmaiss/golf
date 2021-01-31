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

Route::get('/', 'HomeController@index')->name('home');

Route::post('/add', [\App\Http\Controllers\HomeController::class, 'add']);

Route::get('/{id}/delete', [\App\Http\Controllers\HomeController::class, 'delete']);

Route::get('/settings', 'SettingsController@index')->name('settings');

Route::post('/settings/save', [\App\Http\Controllers\SettingsController::class, 'save']);

Auth::routes();

Auth::routes();
