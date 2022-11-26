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
use App\Http\Controllers\DiagnosisTypesController;
use App\Http\Controllers\CommitteeApprovalController;

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
        Route::post('/signup', [AuthController::class, 'signup'])->middleware(['auth:sanctum', 'can:create user'])->name('signup');
        Route::post('/login', [AuthController::class, 'login'])->name('login');
        Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');
        Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
            return $request->user();
        });
        Route::get('/user-info', [AuthController::class, 'getUser'])->middleware('auth:sanctum')->name('user-info');
        Route::post('/update', [AuthController::class, 'update'])->middleware(['auth:sanctum', 'can:edit user'])->name('update');
        Route::post('/delete', [AuthController::class, 'destroy'])->middleware(['auth:sanctum', 'can:delete user'])->name('delete');
    });
    // END Auth

    // START Dashboard
    Route::prefix('/dashboard')->name('dashboard.')->middleware(['auth:sanctum', 'can:access dashboard'])->group(function () {
        Route::get('/index', [DashboardController::class, 'index'])->name('index');
    });
    // END Dashboard

    // START Patients
    Route::prefix('/patients')->name('patients.')->middleware(['auth:sanctum'])->group(function () {
        Route::get('/index', [PatientsController::class, 'index'])->middleware('can:list patients')->name('index');
        Route::post('/show', [PatientsController::class, 'show'])->middleware('can:list patients')->name('show');
        Route::post('/store', [PatientsController::class, 'store'])->middleware('can:list patients')->name('store');
        Route::post('/update', [PatientsController::class, 'update'])->middleware('can:edit patient')->name('update');
        Route::post('/delete', [PatientsController::class, 'destroy'])->middleware('can:list patients')->name('destroy');
//        Route::post('/search-by-full-name/{name}', [PatientsController::class, 'searchByFullName'])->name('searchByFullName');
//        Route::post('/search-by-phone/{phone}', [PatientsController::class, 'searchByPhone'])->name('searchByPhone');
//        Route::post('/search-by-patient-id/{patient}', [PatientsController::class, 'searchByPatientID'])->name('searchByPatientID');
        Route::post('/search-for-patients', [PatientsController::class, 'searchForPatient'])->middleware('can:list patients')->name('searchForPatient');
//        Route::post('/store-by-dr', [PatientsController::class, 'storePatientInfoByDr'])->name('storeByDoctor');
        Route::post('/store/newvisit', [PatientsController::class, 'storePatientNewVisit'])->middleware('can:list patients')->name('storePatientNewVisit');
        Route::get('/patient-info-for-new-visit/{patient_uuid}', [PatientsController::class, 'getPatientInfoForNewVisit'])->middleware('can:list patients')->name('getPatientInfoForNewVisit');
        Route::get('/show-patient-history/{patient_uuid}', [PatientsController::class, 'showPatientHistory'])->middleware('can:list patients')->name('showPatientHistory');
        Route::get('/show-patient-info/{patient_uuid}', [PatientsController::class, 'showPatientInfo'])->middleware('can:list patients')->name('showPatientInfo');
        Route::post('/updatePatientHistory', [PatientsController::class, 'updatePatientHistory'])->middleware('can:list patients')->name('updatePatientHistory');
        Route::post('/update-patient-history-by-antho/{uuid}', [PatientsController::class, 'updatePatientHistoryByAntho'])->middleware('can:list patients')->name('updatePatientHistoryByAntho');
        Route::post('/fetch-gender', [PatientsController::class, 'fetchGender'])->middleware('can:list patients')->name('fetch-gender');
    });
    // END Patients

    // START Diagnosis
    Route::prefix('/diagnosis')->name('diagnosis.')->middleware(['auth:sanctum', 'can:list diagnosis'])->group(function () {
        Route::get('/index', [DiagnosisController::class, 'indexAll'])->middleware('can:list diagnosis')->name('index');
        Route::post('/store', [DiagnosisController::class, 'store'])->name('store');
        Route::delete('/destroy/{id}/{uuid}', [DiagnosisController::class, 'destroy'])->name('destroy');
        Route::get('/show/{uuid}', [DiagnosisController::class, 'show'])->name('show');
        Route::post('/edit', [DiagnosisController::class, 'edit'])->name('edit');
    });
    // END Diagnosis

    // START Diagnosis Types
    Route::prefix('/diagnosis-types')->name('diagnosis-types.')->middleware(['auth:sanctum', 'can:list diagnosis'])->group(function () {
        Route::get('/index', [DiagnosisTypesController::class, 'index'])->name('index');
        Route::post('/store', [DiagnosisTypesController::class, 'store'])->name('store');
        Route::post('/update', [DiagnosisTypesController::class, 'update'])->name('update');
        Route::post('/delete', [DiagnosisTypesController::class, 'destroy'])->name('delete');
    });
    // END Diagnosis Types

    // START Symptoms Types
    Route::prefix('/symptoms-types')->name('symptoms-types.')->middleware(['auth:sanctum', 'can:list symptoms type'])->group(function () {
        Route::get('/index', [SymptomsTypesController::class, 'index'])->name('index');
        Route::post('/store', [SymptomsTypesController::class, 'store'])->name('store');
        Route::post('/update', [SymptomsTypesController::class, 'update'])->name('update');
        Route::post('/delete', [SymptomsTypesController::class, 'destroy'])->name('delete');
    });
    // END Symptoms Types

    // START Symptoms
    Route::prefix('/symptoms')->name('symptoms.')->middleware(['auth:sanctum', 'can:list symptoms type'])->group(function () {
        Route::get('/index', [SymptomsController::class, 'index'])->name('index');
        Route::post('/store', [SymptomsController::class, 'store'])->name('store');
        Route::get('/show/{uuid}', [SymptomsController::class, 'show'])->name('show');
        Route::delete('/delete/{id}/{patient_uuid}', [SymptomsController::class, 'destroy'])->name('delete');
        Route::post('/edit', [SymptomsController::class, 'edit'])->name('edit');
    });
    // END Symptoms

    // START Medical Lab
    Route::prefix('/lab')->name('lab.')->middleware(['auth:sanctum', 'can:list medical lab tests'])->group(function () {
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
    Route::prefix('/lab-sampling')->name('lab_sampling.')->middleware(['auth:sanctum', 'can:list medical lab tests'])->group(function () {
        Route::post('/store', [LabSamplingController::class, 'store'])->name('store');
    });
    // END Lab Sampling

    // START Lab Results
    Route::prefix('/lab-results')->name('lab_results.')->middleware(['auth:sanctum', 'can:list medical lab tests'])->group(function () {
        Route::post('/store', [LabResultsController::class, 'store'])->name('store');
    });
    // END Lab Results

    // START Lab Test Groups
    Route::prefix('/lab-test-groups')->name('test-groups.')->middleware(['auth:sanctum', 'can:list medical lab tests'])->group(function () {
        Route::get('/index', [LabTestGroupsController::class, 'index'])->name('index');
        Route::post('/store', [LabTestGroupsController::class, 'store'])->name('store');
        Route::post('/update', [LabTestGroupsController::class, 'update'])->name('update');
        Route::post('/delete', [LabTestGroupsController::class, 'destroy'])->name('delete');
        Route::get('/index-group-names', [LabTestGroupsController::class, 'indexGroupNames'])->name('group.names');
        Route::post('/index-test-names', [LabTestGroupsController::class, 'indexTestNames'])->name('test.names');
    });
    // END Lab Test Groups

    // START Treatment
    Route::prefix('/treatment')->name('treatment.')->middleware(['auth:sanctum', 'can:access doctor department'])->group(function () {
//        Route::get('/index/{patient_id}', [TreatmentController::class, 'index'])->name('index'); //
        Route::get('/{patient_history_id}', [TreatmentController::class, 'show'])->name('show.history'); // show the current treatment related to the current history
        Route::post('/store', [TreatmentController::class, 'store'])->name('store');
        Route::post('/update', [TreatmentController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}/{uuid}', [TreatmentController::class, 'destroy'])->name('destroy');
        Route::post('/show', [TreatmentController::class, 'show'])->name('show');
    });
    // END Treatment

    // START Pharmacy Inventory
    Route::prefix('/pharmacy')->name('pharmacy.')->middleware(['auth:sanctum', 'can:list pharmacy'])->group(function () {
        Route::get('/index', [PharmacyController::class, 'index'])->name('index'); // List all
        Route::get('/{id}', [PharmacyController::class, 'show'])->name('show');
        Route::post('/store', [PharmacyController::class, 'store'])->name('store');
        Route::post('/update/{id}', [PharmacyController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [PharmacyController::class, 'destroy'])->name('destroy');
        Route::post('/store-treatment', [PharmacyController::class, 'storeTreatment'])->name('store-treatment');
    });
    // END Pharmacy Inventory

    // START User Permissions
    Route::prefix('/permissions')->name('permissions.')->middleware(['auth:sanctum', 'can:list users'])->group(function () {
        Route::get('/index', [PermissionsController::class, 'index'])->name('permissions.index'); // List all

    });
    // END User Permissions

    // START Antho
    Route::prefix('/antho')->name('antho.')->middleware(['auth:sanctum', 'can:access antho department'])->group(function () {
        Route::post('/show', [AnthoController::class, 'show'])->name('show');
    });
    // END Antho

    // START Providers
    Route::prefix('/providers')->name('providers.')->middleware(['auth:sanctum', 'can:list providers'])->group(function () {
        Route::get('/index', [ProvidersController::class, 'index'])->name('index');
        Route::post('/store', [ProvidersController::class, 'store'])->name('store');
        Route::post('/update', [ProvidersController::class, 'update'])->name('update');
        Route::post('/delete', [ProvidersController::class, 'destroy'])->name('delete');
    });
    // END Providers

    // START Drugs
    Route::prefix('/drugs')->name('drugs.')->middleware(['auth:sanctum', 'can:list drugs'])->group(function () {
        Route::get('/index', [DrugsController::class, 'index'])->name('index');
        Route::post('/store', [DrugsController::class, 'store'])->name('store');
        Route::post('/update', [DrugsController::class, 'update'])->name('update');
        Route::post('/delete', [DrugsController::class, 'destroy'])->name('delete');
    });
    // END Drugs

    // START Documents
    Route::prefix('/documents')->name('documents.')->middleware(['auth:sanctum', 'can:list inventory'])->group(function () {
        Route::post('/store', [DocumentsController::class, 'store'])->name('store');
        Route::get('/index-inventory', [DocumentsController::class, 'indexInventory'])->name('index-inventory');
        Route::get('/available-drugs', [DocumentsController::class, 'indexAvailableDrugs'])->name('available-drugs');
        Route::get('/output-document', [DocumentsController::class, 'indexOutputDocuments'])->name('output-documents');
    });
    // END Documents

    // START Committee Approval
    Route::prefix('/committee-approval')->name('committee-approval.')->middleware(['auth:sanctum', 'can:access committee approval'])->group(function () {
        Route::get('/index', [CommitteeApprovalController::class, 'index'])->name('index');
    });
    // END Committee Approval
});
// END API v1
