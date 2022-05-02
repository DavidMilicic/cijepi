<?php

use Illuminate\Support\Facades\Route;
use App\Models\moguci_datumi;
use App\Models\zakazani_datumi;
use App\Models\Poruke;
use Illuminate\Support\Facades\DB;
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

Route::post('/promijeniime', function () {
    DB::table('users')
        ->where('email', Auth::user()->email)
        ->update(['name' => request('name')]);
    return redirect('dashboard')->with('success', 'Ime uspješno promjenjeno!');
});

Route::post('/promijenisifru', function () {
    DB::table('users')
        ->where('email', Auth::user()->email)
        ->update(['password' => bcrypt(request('password'))]);
    return redirect('dashboard')->with('success', 'Šifra uspješno promjenjena!');
});

Route::get('/izbrisitermin', function () {
    DB::table('zakazani_datumi')
        ->where('email', Auth::user()->email)
        ->delete();
    return redirect('dashboard')->with('success', 'Termin uspješno izbrisan!');
});

Route::post('/posaljiporuku', function () {
    Poruke::updateOrCreate([
        'name' => request('name'),
        'email' => request('email'),
        'poruka' => request('poruka'),
    ]);
    return redirect('kontakt')->with('success', 'Poruka uspješno poslana!');
});

Route::get('/doktorizbrisitermin', function () {
    if (Auth::user()->hasRole('korisnik')) {
        return view('korisnikdash');
    } elseif (Auth::user()->hasRole('doktor')) {
        return view('doktordash');
    } elseif (Auth::user()->hasRole('admin')) {
        return view('dashboard');
    }
    DB::table('zakazani_datumi')
        ->where('email', request('email'))
        ->delete();
    return redirect('dashboard')->with('successTerminDel', 'Termin uspješno izbrisan!');
});

Route::get('/izbrisikorisnika', function () {
    if (Auth::user()->hasRole('korisnik')) {
        return view('korisnikdash');
    } elseif (Auth::user()->hasRole('doktor')) {
        return view('doktordash');
    } elseif (Auth::user()->hasRole('admin')) {
        return view('dashboard');
    }
    DB::table('users')
        ->where('id', request('id'))
        ->delete();
    return redirect('dashboard')->with('success', 'Korisnik uspješno izbrisan!');
});

//auth route for everyone - gleda da li su logirani
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::get('/onama', 'App\Http\Controllers\DashboardController@onama')->name('onama');
    Route::get('/datumi', 'App\Http\Controllers\DatumiController@datumi')->name('datumi');
    Route::get('/kontakt', 'App\Http\Controllers\DashboardController@kontakt')->name('kontakt');;
});

require __DIR__ . '/auth.php';
