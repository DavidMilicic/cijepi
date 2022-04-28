<?php

use Illuminate\Support\Facades\Route;
use App\Models\moguci_datumi;
use App\Models\zakazani_datumi;

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

#odaziva se ovaj /create
Route::post('/createmoguci', function () {
    moguci_datumi::updateOrCreate([
        'datum' => request('datum')
    ]);
    return redirect('datumi')->with('success', 'Termin uspješno dodan!');
});

Route::post('/createzakazani', function () {
    zakazani_datumi::updateOrCreate([
        'name' => request('name'),
        'email' => request('email'),
        'datum' => request('datum'),
        'broj' => request('broj'),
        'marka' => request('marka')
    ]);
    return redirect('datumi')->with('success', 'Termin uspješno zakazan!');
});


//auth route for everyone - gleda da li su logirani
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::get('/onama', 'App\Http\Controllers\DashboardController@onama')->name('onama');
    Route::get('/datumi', 'App\Http\Controllers\DatumiController@datumi')->name('datumi');
    Route::get('/kontakt', 'App\Http\Controllers\DashboardController@kontakt')->name('kontakt');
});

require __DIR__.'/auth.php';
