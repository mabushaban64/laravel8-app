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

Route::get('/', function () {return view('pages.index');})->name('dashboard');
Route::get('/profile', function () {return view('pages.profile');})->name('profile');
Route::get('/login', function () {return view('auth.signin');})->name('signin');
Route::get('/register', function () {return view('auth.signup');})->name('signup');
Route::get('/forget-password', function () {return view('auth.forget-password');})->name('forget-password');

