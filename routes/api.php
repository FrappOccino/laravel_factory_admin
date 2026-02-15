<?php


use App\Http\Controllers\Api\EmployeeApiController;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->middleware('throttle:60,1')->group(function () {
    Route::apiResource('employees', EmployeeApiController::class);
});
