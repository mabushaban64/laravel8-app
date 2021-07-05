<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create somethiBPng great!
|
*/

Route::get('/', function () {
   // return view('welcome');
  // return view('auth.verify-email');
  //return view('auth.password-reset');
 // return view('auth.forget-password');
 // return view('auth.password-confirmation');
  return view('pages.index');

});
