<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployedController;
use App\Http\Controllers\RecordController;

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

Route::resource('records', App\Http\Controllers\RecordController::class)->middleware('auth');


Route::get('editroom/{id}', [EmployedController::class, 'editroom'])->name('employeds.editroom');
Route::post('file-import', [EmployedController::class, 'fileImport'])->name('file-import');
Route::get('export-pdf', [EmployedController::class, 'downloadPdf'])->name('export-pdf');
Route::get('export-pdf/{id}', [EmployedController::class, 'downloadPdfRecords'])->name('export-pdf-records');

Route::group(['middleware'=>'auth'], function(){

	Route::get('/', [App\Http\Controllers\EmployedController::class, 'index'])->name('employeds');

});
