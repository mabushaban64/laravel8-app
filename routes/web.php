<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\RolesController;
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
Route::get('/dashboard', function () {return view('pages.index');})->middleware(['auth','role:super-admin'])->name('dashboard');


Route::group(['middleware' => ['auth'/* ,'role:super-admin|users-Admin|users-limitted' */]], function () {
    //
    Route::prefix('/users')->name('users')->group(function () {

        Route::get('/',[UserController::class, 'index'])->middleware( ['role_or_permission:super-admin|users'])->name('');
        Route::post('/store',[UserController::class, 'store'])->middleware( ['role_or_permission:super-admin|users.add'])->name('.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->middleware( ['role_or_permission:super-admin|users.edit'])->name('.edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->middleware( ['role_or_permission:super-admin|users.edit'])->name('.update');
        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->middleware( ['role_or_permission:super-admin|users.delete'])->name('.delete');
        Route::post('/deleteall', [UserController::class, 'deleteall'])->middleware( ['role_or_permission:super-admin|users.deleteall'])->name('.deleteall');

        Route::get('/roles/{id}', [UserController::class, 'roles'])->middleware( ['role_or_permission:super-admin|users.roles'])->name('.roles');
        Route::put('/grantRole/{id}', [UserController::class, 'grantRole'])->middleware( ['role_or_permission:super-admin|users.grantRole'])->name('.grantRole');
        Route::put('/revokeRole/{id}', [UserController::class, 'revokeRole'])->middleware( ['role_or_permission:super-admin|users.revokeRole'])->name('.revokeRole');

        Route::get('export/excel', [UserController::class, 'Excelexport'])->middleware( ['role_or_permission:super-admin|users.Excelexport'])->name('.export.excel');
        Route::get('export/pdf', [UserController::class, 'PDFexport'])->middleware( ['role_or_permission:super-admin|users.PDFexport'])->name('.export.pdf');

    });
});

Route::prefix('/roles')->name('roles')->middleware('auth')->group(function () {

    Route::get('/',[RolesController::class, 'index'])->middleware( ['role_or_permission:super-admin|roles'])->name('');
    Route::get('/get',[RolesController::class, 'getRoles'])->middleware( ['role_or_permission:super-admin|roles'])->name('.get');

    Route::get('/permissions/{id}', [RolesController::class, 'permissions'])->middleware( ['role_or_permission:super-admin|roles.permissions'])->name('.permissions');
    Route::put('/grantPerm/{id}', [RolesController::class, 'grantPerm'])->middleware( ['role_or_permission:super-admin|roles.grantPermission'])->name('.grantPerm');
    Route::put('/revokePerm/{id}', [RolesController::class, 'revokePerm'])->middleware( ['role_or_permission:super-admin|roles.revokePermission'])->name('.revokePerm');
});



Route::prefix('/dropzone')->name('dropzone')->middleware('auth')->group(function () {

    Route::get('/',[DropzoneController::class, 'index'])->middleware( ['role_or_permission:super-admin|dropzone'])->name('');
    Route::post('/store',[DropzoneController::class, 'store'])->middleware( ['role_or_permission:super-admin|dropzone.store'])->name('.store');
    Route::delete('/delete/{id}', [DropzoneController::class, 'destroy'])->middleware( ['role_or_permission:super-admin|dropzone.delete'])->name('.delete');
    Route::get('/get/{id}', [DropzoneController::class, 'get'])->middleware( ['role_or_permission:super-admin|dropzone.get'])->name('.get');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
