<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DatumiController extends Controller
{
    public function datumi()
    {
         if (Auth::user()->hasRole('korisnik')) {
              return view('datumikorisnik');
         } elseif (Auth::user()->hasRole('doktor')) {
              return view('datumidoktor');
         } elseif (Auth::user()->hasRole('admin')) {
              return view('datumidoktor');
         }
    }
    public function update(Request $request)
    {
        $request->all(); // here you're acessing all the data you send it
    }
}
