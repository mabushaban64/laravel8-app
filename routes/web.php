<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {return view('home');})->name('');
Route::get('/dashboard', function () {return view('pages.index');})->middleware('auth')->name('dashboard');



Route::prefix('/users')->name('users')->middleware('auth')->group(function () {
    Route::get('/',[UserController::class, 'index'])->name('');
    Route::get('/get',[UserController::class, 'getUsers'])->name('.get');
    Route::post('/store',[UserController::class, 'store'])->name('.store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('.edit');
    Route::put('/update/{id}', [UserController::class, 'update'])->name('.update');
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('.delete');
    Route::post('/deleteall', [UserController::class, 'deleteall'])->name('.deleteall');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
