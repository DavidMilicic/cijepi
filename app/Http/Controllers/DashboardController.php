<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
     public function index()
     {
          if (Auth::user()->hasRole('korisnik')) {
               return view('korisnikdash');
          } elseif (Auth::user()->hasRole('doktor')) {
               return view('doktordash');
          } elseif (Auth::user()->hasRole('admin')) {
               return view('dashboard');
          }
     }

     public function onama()
     {
          if (Auth::user()->hasRole('korisnik')) {
               return view('onama');
          } elseif (Auth::user()->hasRole('doktor')) { #ne dopusta da ide na /onama nego opet prikaze dashboard
               return view('doktordash');
          } elseif (Auth::user()->hasRole('admin')) {
               return view('onama');
          }
     }

     public function kontakt()
     {
          if (Auth::user()->hasRole('korisnik')) {
               return view('kontakt');
          } elseif (Auth::user()->hasRole('doktor')) { #ne dopusta da ide na /kontakt nego opet prikaze dashboard
               return view('doktordash');
          } elseif (Auth::user()->hasRole('admin')) {
               return view('kontakt');
          }
     }
}
