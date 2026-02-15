<?php


use App\Http\Controllers\Api\EmployeeApiController;
use Illuminate\Support\Facades\Route;


Route::apiResource('employees', EmployeeApiController::class);
