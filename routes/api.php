<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ExamController;
use App\Http\Controllers\API\MonitoringController;
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

Route::post('login', [AuthController::class, 'login']);
Route::get('monitorings', [MonitoringController::class, 'index']);
Route::post('monitorings', [MonitoringController::class, 'store']);
Route::get('exams', [ExamController::class, 'index']);
