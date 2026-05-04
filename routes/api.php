<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AuditController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\IncidentController;
use App\Http\Controllers\Api\ServiceController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me',      [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('clients',   ClientController::class);
    Route::apiResource('services',  ServiceController::class);
    Route::apiResource('incidents', IncidentController::class);
    Route::apiResource('audits',    AuditController::class);

    Route::post('incidents/{incident}/assign',  [IncidentController::class, 'assign']);
    Route::post('incidents/{incident}/resolve', [IncidentController::class, 'resolve']);
    Route::get('incidents/{incident}/comments', [IncidentController::class, 'comments']);
    Route::post('incidents/{incident}/comments',[IncidentController::class, 'addComment']);

    Route::post('audits/{audit}/complete', [AuditController::class, 'complete']);
});