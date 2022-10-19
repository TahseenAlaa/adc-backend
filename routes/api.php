<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\MedicalLabController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\SymptomsTypesController;
use App\Http\Controllers\SymptomsController;

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


// START API v1
Route::prefix('/v1')->name('api.v1.')->group(function () {
    // START Auth
    Route::prefix('/auth')->name('auth.')->group(function () {
        Route::post('/signup', [AuthController::class, 'signup'])->name('signup'); // TODO protect this route ->middleware('auth:sanctum')
        Route::post('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');
        Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
            return $request->user();
        });
    });
    // END Auth

    // START Dashboard
    Route::prefix('/dashboard')->name('dashboard.')->middleware('auth:sanctum')->group(function () {
        Route::get('/index', [DashboardController::class, 'index'])->name('index');
    });
    // END Dashboard

    // START Patients
    Route::prefix('/patients')->name('patients.')->middleware('auth:sanctum')->group(function () {
        Route::get('/index', [PatientsController::class, 'index'])->name('index');
        Route::get('/{id}', [PatientsController::class, 'show'])->name('show');
        Route::post('/store', [PatientsController::class, 'store'])->name('store');
        Route::post('/update/{id}', [PatientsController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [PatientsController::class, 'destroy'])->name('destroy');
//        Route::post('/search-by-full-name/{name}', [PatientsController::class, 'searchByFullName'])->name('searchByFullName');
//        Route::post('/search-by-phone/{phone}', [PatientsController::class, 'searchByPhone'])->name('searchByPhone');
//        Route::post('/search-by-patient-id/{patient}', [PatientsController::class, 'searchByPatientID'])->name('searchByPatientID');
        Route::post('/search-for-patients', [PatientsController::class, 'searchForPatient'])->name('searchForPatient');
//        Route::post('/store-by-dr', [PatientsController::class, 'storePatientInfoByDr'])->name('storeByDoctor');
        Route::post('/store/newvisit', [PatientsController::class, 'storePatientNewVisit'])->name('storePatientNewVisit');
        Route::get('/patient-info-for-new-visit/{patient_uuid}', [PatientsController::class, 'getPatientInfoForNewVisit'])->name('getPatientInfoForNewVisit');
        Route::get('/show-patient-history/{patient_uuid}', [PatientsController::class, 'showPatientHistory'])->name('showPatientHistory');
        Route::get('/show-patient-info/{patient_uuid}', [PatientsController::class, 'showPatientInfo'])->name('showPatientInfo');
        Route::post('/updatePatientHistory/{uuid}', [PatientsController::class, 'updatePatientHistory'])->name('updatePatientHistory');
        Route::post('/update-patient-history-by-antho/{uuid}', [PatientsController::class, 'updatePatientHistoryByAntho'])->name('updatePatientHistoryByAntho');
    });
    // END Patients

    // START Diagnosis
    Route::prefix('/diagnosis')->name('diagnosis.')->middleware('auth:sanctum')->group(function () {
//        Route::get('/index/{id}', [DiagnosisController::class, 'index'])->name('index'); // Show all diagnoses
//        Route::get('/{id}', [DiagnosisController::class, 'show'])->name('show'); // Show one diagnosis related to the current history
//        Route::post('/store', [DiagnosisController::class, 'store'])->name('store');
//        Route::patch('/update/{id}', [DiagnosisController::class, 'update'])->name('update');
//        Route::delete('/destroy/{id}', [DiagnosisController::class, 'destroy'])->name('destroy');
        Route::get('/types', [DiagnosisController::class, 'types'])->name('types');
    });
    // END Diagnosis

    // START Symptoms Types
    Route::prefix('/symptoms-types')->name('symptoms-types.')->middleware('auth:sanctum')->group(function () {
        Route::get('/index', [SymptomsTypesController::class, 'index'])->name('index');
    });
    // END Symptoms Types

    // START Symptoms
    Route::prefix('/symptoms')->name('symptoms.')->middleware('auth:sanctum')->group(function () {
        Route::post('/store', [SymptomsController::class, 'store'])->name('store');
    });
    // END Symptoms

    // START Medical Lab
    Route::prefix('/lab')->name('lab.')->middleware('auth:sanctum')->group(function () {
        Route::get('/index/{patient_id}', [MedicalLabController::class, 'index'])->name('index'); // Show all tests
        Route::get('/{patient_history_id}', [MedicalLabController::class, 'show'])->name('show'); // show the current test related to the current history
        Route::post('/store', [MedicalLabController::class, 'store'])->name('store');
        Route::post('/update', [MedicalLabController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [MedicalLabController::class, 'destroy'])->name('destroy');
        Route::get('/show-history/{id}', [MedicalLabController::class, 'showHistory'])->name('history.show');
    });
    // END Medical Lab

    // START Treatment
    Route::prefix('/treatment')->name('treatment.')->middleware('auth:sanctum')->group(function () {
//        Route::get('/index/{patient_id}', [TreatmentController::class, 'index'])->name('index'); //
        Route::get('/{patient_history_id}', [TreatmentController::class, 'show'])->name('show'); // show the current treatment related to the current history
        Route::post('/store', [TreatmentController::class, 'store'])->name('store');
        Route::post('/update/{id}', [TreatmentController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [TreatmentController::class, 'destroy'])->name('destroy');
    });
    // END Treatment

    // START Pharmacy Inventory
    Route::prefix('/pharmacy')->name('pharmacy.')->middleware('auth:sanctum')->group(function () {
        Route::get('/index', [PharmacyController::class, 'index'])->name('index'); // List all
        Route::get('/{id}', [PharmacyController::class, 'show'])->name('show');
        Route::post('/store', [PharmacyController::class, 'store'])->name('store');
        Route::post('/update/{id}', [PharmacyController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [PharmacyController::class, 'destroy'])->name('destroy');
    });
    // END Pharmacy Inventory

    // START User Permissions
    Route::prefix('/permissions')->name('permissions.')->middleware('auth:sanctum')->group(function () {
        Route::get('/index', [PermissionsController::class, 'index'])->name('permissions.index'); // List all

    });
    // END User Permissions
});
// END API v1
