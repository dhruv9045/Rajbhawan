<?php

use DeepCopy\Filter\ReplaceFilter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->name('home');
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');
Route::get('/admin/home/symptomForm', [App\Http\Controllers\HomeController::class, 'adminSymptoms'])->name('admin.symptoms');
Route::get('/home/personForm', [App\Http\Controllers\HomeController::class, 'personalForm'])->name('patient');
Route::post('/home/personForm', [App\Http\Controllers\PersonalController::class, 'index'])->name('addpatient');
Route::post('/home/symptomForm', [App\Http\Controllers\SymptomController::class, 'addSymptoms'])->name('addsymptoms');
Route::get('/home', [App\Http\Controllers\PersonalController::class, 'getPersonDetail']);
Route::delete('/home/personForm/{id}', [App\Http\Controllers\PersonalController::class, 'deletePatient'])->name('deletePatient');