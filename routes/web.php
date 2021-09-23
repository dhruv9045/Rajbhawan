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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->name('home')->middleware('is_admin');
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::get('/home/personForm', [App\Http\Controllers\HomeController::class, 'personalForm'])->name('patient');
Route::post('/home/personForm', [App\Http\Controllers\PersonalController::class, 'index'])->name('addpatient');
Route::get('/home', [App\Http\Controllers\PersonalController::class, 'getPersonDetail']);
// Route::delete('/home/personForm/{id}', [App\Http\Controllers\PersonalController::class, 'deletePatient'])->name('deletePatient');
Route::get('/home/personForm/edit/{id}', [App\Http\Controllers\PersonalController::class, 'editPagePatient'])->name('editPatient');
Route::post('/home/personForm/update/{id}', [App\Http\Controllers\PersonalController::class, 'updateFormPatient'])->name('updateFormPatient');
Route::get('/home/patient/view/{yearly_no}/id/{id}', [App\Http\Controllers\PersonalController::class, 'showPatient'])->name('home.show');
Route::post('/home/patient/addSymptom',[App\Http\Controllers\SymptomController::class,'addSymptoms'])->name('symptom.add');
Route::get('/home/symptomForm', [App\Http\Controllers\SymptomController::class, 'showSymptom'])->name('symptom.form');
Route::get('/home/symptomForm/edit/{id}', [App\Http\Controllers\SymptomController::class, 'editSymptom'])->name('symptom.edit');
Route::post('/home/patient/update/{id}', [App\Http\Controllers\SymptomController::class, 'updateSymptom'])->name('symptom.update');
Route::get('/home/symptomForm/print/{yearly_no}/id/{id}', [App\Http\Controllers\SymptomController::class, 'printSymptom'])->name('symptom.print');


// Route::get('/home/patient/view/{id}', [App\Http\Controllers\SymptomController::class, 'showPatient'])->name('home.show.symptom');

// Route::get('/admin/home/symptomForm', [App\Http\Controllers\HomeController::class, 'index'])->name('viewSym');
