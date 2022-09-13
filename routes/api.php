<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\MedicalLabController;
use App\Http\Controllers\PharmacyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// START API v1
Route::prefix('/v1')->name('api.v1.')->group(function () {
    // START Auth
    Route::prefix('/auth')->name('auth.')->group(function () {
        Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
        Route::post('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');
    });
    // END Auth

    // START Patients
    Route::prefix('/patients')->name('patients.')->group(function () {
        Route::get('/index', [PatientsController::class, 'index'])->name('index');
        Route::get('/{id}', [PatientsController::class, 'show'])->name('show');
        Route::post('/store', [PatientsController::class, 'store'])->name('store');
        Route::patch('/update/{id}', [PatientsController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [PatientsController::class, 'destroy'])->name('destroy');
        Route::get('/search-by-full-name/{name}', [PatientsController::class, 'searchByFullName'])->name('searchByFullName');
        Route::get('/search-by-phone/{phone}', [PatientsController::class, 'searchByPhone'])->name('searchByPhone');
        Route::get('/search-by-patient-id/{patient}', [PatientsController::class, 'searchByPatientID'])->name('searchByPatientID');
    });
    // END Patients

    // START Diagnosis
    Route::prefix('/diagnosis')->name('diagnosis.')->group(function () {
        Route::get('/index/{id}', [DiagnosisController::class, 'index'])->name('index'); // Show all diagnoses
        Route::get('/{id}', [DiagnosisController::class, 'show'])->name('show'); // Show one diagnosis related to the current history
        Route::post('/store', [DiagnosisController::class, 'store'])->name('store');
        Route::patch('/update/{id}', [DiagnosisController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [DiagnosisController::class, 'destroy'])->name('destroy');
    });
    // END Diagnosis

    // START Medical Lab
    Route::prefix('/lab')->name('lab.')->group(function () {
        Route::get('/index/{patient_id}', [MedicalLabController::class, 'index'])->name('index'); // Show all tests
        Route::get('/{patient_history_id}', [MedicalLabController::class, 'show'])->name('show'); // show the current test related to the current history
        Route::post('/store', [MedicalLabController::class, 'store'])->name('store');
        Route::patch('/update/{id}', [MedicalLabController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [MedicalLabController::class, 'destroy'])->name('destroy');
    });
    // END Medical Lab
});
// END API v1
