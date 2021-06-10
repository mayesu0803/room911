<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;

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
    return view('auth.login');
});

Auth::routes();
Route::resource('employeds', App\Http\Controllers\EmployedController::class)->middleware('auth');

Route::resource('departments', App\Http\Controllers\DepartmentController::class)->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*
Route::get('file-import-export', [UserController::class, 'fileImportExport']);
Route::post('file-import', [UserController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [UserController::class, 'fileExport'])->name('file-export');
*/

Route::get('file-import-export', [DepartmentController::class, 'fileImportExport']);
Route::post('file-import', [DepartmentController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [DepartmentController::class, 'fileExport'])->name('file-export');
Route::get('/', function () {
    return view('welcome');
});