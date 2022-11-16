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
use App\Http\Controllers\LabTestGroupsController;
use App\Http\Controllers\AnthoController;
use App\Http\Controllers\LabSamplingController;
use App\Http\Controllers\LabResultsController;
use App\Http\Controllers\ProvidersController;
use App\Http\Controllers\DrugsController;
use App\Http\Controllers\DocumentsController;

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
        Route::get('/index', [AuthController::class, 'index'])->middleware('auth:sanctum')->name('index');
        Route::post('/signup', [AuthController::class, 'signup'])->name('signup'); // TODO protect this route ->middleware('auth:sanctum')
        Route::post('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');
        Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
            return $request->user();
        });
        Route::get('/user-info', [AuthController::class, 'getUser'])->middleware('auth:sanctum')->name('user-info');
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
        Route::post('/updatePatientHistory', [PatientsController::class, 'updatePatientHistory'])->name('updatePatientHistory');
        Route::post('/update-patient-history-by-antho/{uuid}', [PatientsController::class, 'updatePatientHistoryByAntho'])->name('updatePatientHistoryByAntho');
    });
    // END Patients

    // START Diagnosis
    Route::prefix('/diagnosis')->name('diagnosis.')->middleware('auth:sanctum')->group(function () {
        Route::get('/index', [DiagnosisController::class, 'indexAll'])->name('index');
        Route::post('/store', [DiagnosisController::class, 'store'])->name('store');
        Route::delete('/destroy/{id}/{uuid}', [DiagnosisController::class, 'destroy'])->name('destroy');
        Route::get('/types', [DiagnosisController::class, 'types'])->name('types');
        Route::get('/show/{uuid}', [DiagnosisController::class, 'show'])->name('show');
        Route::post('/edit', [DiagnosisController::class, 'edit'])->name('edit');
    });
    // END Diagnosis

    // START Symptoms Types
    Route::prefix('/symptoms-types')->name('symptoms-types.')->middleware('auth:sanctum')->group(function () {
        Route::get('/index', [SymptomsTypesController::class, 'index'])->name('index');
    });
    // END Symptoms Types

    // START Symptoms
    Route::prefix('/symptoms')->name('symptoms.')->middleware('auth:sanctum')->group(function () {
        Route::get('/index', [SymptomsController::class, 'index'])->name('index');
        Route::post('/store', [SymptomsController::class, 'store'])->name('store');
        Route::get('/show/{uuid}', [SymptomsController::class, 'show'])->name('show');
        Route::delete('/delete/{id}/{patient_uuid}', [SymptomsController::class, 'destroy'])->name('delete');
        Route::post('/edit', [SymptomsController::class, 'edit'])->name('edit');
    });
    // END Symptoms

    // START Medical Lab
    Route::prefix('/lab')->name('lab.')->middleware('auth:sanctum')->group(function () {
        Route::get('/index/{patient_id}', [MedicalLabController::class, 'index'])->name('index'); // Show all tests
        Route::get('/{uuid}', [MedicalLabController::class, 'show'])->name('show'); // show the current test related to the current history
        Route::post('/store', [MedicalLabController::class, 'store'])->name('store');
        Route::post('/update', [MedicalLabController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}/{uuid}', [MedicalLabController::class, 'destroy'])->name('destroy');
        Route::get('/show-history/{id}', [MedicalLabController::class, 'showHistory'])->name('history.show');
        Route::post('/edit', [MedicalLabController::class, 'edit'])->name('edit.test');
    });
    // END Medical Lab

    // START Lab Sampling
    Route::prefix('/lab-sampling')->name('lab_sampling.')->middleware('auth:sanctum')->group(function () {
        Route::post('/store', [LabSamplingController::class, 'store'])->name('store');
    });
    // END Lab Sampling

    // START Lab Results
    Route::prefix('/lab-results')->name('lab_results.')->middleware('auth:sanctum')->group(function () {
        Route::post('/store', [LabResultsController::class, 'store'])->name('store');
    });
    // END Lab Results

    // START Lab Test Groups
    Route::prefix('/lab-test-groups')->name('test-groups.')->middleware('auth:sanctum')->group(function () {
        Route::get('/index', [LabTestGroupsController::class, 'index'])->name('index');
        Route::delete('/delete/{id}', [LabTestGroupsController::class, 'destroy'])->name('delete');
        Route::post('/store', [LabTestGroupsController::class, 'store'])->name('store');
        Route::get('/index-group-names', [LabTestGroupsController::class, 'indexGroupNames'])->name('group.names');
        Route::post('/index-test-names', [LabTestGroupsController::class, 'indexTestNames'])->name('test.names');
    });
    // END Lab Test Groups

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

    // START Antho
    Route::prefix('/antho')->name('antho.')->middleware('auth:sanctum')->group(function () {
        Route::post('/show', [AnthoController::class, 'show'])->name('show');
    });
    // END Antho

    // START Providers
    Route::prefix('/providers')->name('providers.')->middleware('auth:sanctum')->group(function () {
        Route::get('/index', [ProvidersController::class, 'index'])->name('index');
        Route::post('/store', [ProvidersController::class, 'store'])->name('store');
    });
    // END Providers

    // START Drugs
    Route::prefix('/drugs')->name('drugs.')->middleware('auth:sanctum')->group(function () {
        Route::get('/index', [DrugsController::class, 'index'])->name('index');
        Route::post('/store', [DrugsController::class, 'store'])->name('store');
    });
    // END Drugs

    // START Documents
    Route::prefix('/documents')->name('documents.')->middleware('auth:sanctum')->group(function () {
        Route::post('/store', [DocumentsController::class, 'store'])->name('store');
        Route::get('/index-inventory', [DocumentsController::class, 'indexInventory'])->name('index-inventory');
        Route::get('/available-drugs', [DocumentsController::class, 'indexAvailableDrugs'])->name('available-drugs');
        Route::get('/output-document', [DocumentsController::class, 'indexOutputDocuments'])->name('output-documents');
    });
    // END Documents
});
// END API v1
