<?php

use App\Http\Controllers\V1\EmployerController;
use App\Http\Controllers\V1\LoginController;
use App\Http\Controllers\V1\ProfileController;
use App\Http\Controllers\V1\WorkerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->group(function () {
    Route::prefix('onboarding')->group(function () {
        Route::post('/login', [LoginController::class, 'login']);
    });

    Route::middleware('auth:sanctum')->prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'profile']);
        Route::get('/worker', [ProfileController::class, 'workerProfile']);
        Route::get('/employer', [ProfileController::class, 'employerProfile']);
    });

    Route::prefix('workers')->group(function () {
        Route::get('/get-all', [WorkerController::class, 'getAllWorkers']);
        Route::get('/get-worker/{id}', [WorkerController::class, 'getWorkerById']);
    });

    Route::prefix('employers')->group(function () {
        Route::get('/get-all', [EmployerController::class, 'getAllEmployers']);
        Route::get('/get-employer/{id}', [EmployerController::class, 'getEmployerById']);
    });
});
