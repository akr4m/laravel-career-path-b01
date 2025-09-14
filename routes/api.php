<?php

use App\Http\Controllers\Api\TaskController as ApiTaskController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')
    ->name('api.')
    ->group(function () {
        Route::apiResource('tasks', ApiTaskController::class);
    });
