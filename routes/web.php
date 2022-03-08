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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/', function () {
    return view('insertDatum');
});

//auth route for everyone
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::get('/dashboard/datumi', 'App\Http\Controllers\DashboardController@datumi')->name('dashboard.datumi');
    Route::get('/dashboard/onama', 'App\Http\Controllers\DashboardController@onama')->name('dashboard.onama');
    Route::get('/dashboard/kontakt', 'App\Http\Controllers\DashboardController@kontakt')->name('dashboard.kontakt');
});

require __DIR__.'/auth.php';
