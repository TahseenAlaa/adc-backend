<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientsController;

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
    // START Patients
    Route::prefix('/patients')->name('patients.')->group(function () {
        Route::get('/index', [PatientsController::class, 'index'])->name('index');
        Route::get('/{id}', [PatientsController::class, 'show'])->name('show');
        Route::post('/store', [PatientsController::class, 'store'])->name('store');
        Route::delete('/destroy/{id}', [PatientsController::class, 'destroy'])->name('destroy');
    });
    // END Patients
});
// END API v1
