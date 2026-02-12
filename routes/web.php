<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


 
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Guest Routes (only not logged in users)
|--------------------------------------------------------------------------
*/
Route::middleware(['guest'])->name('auth.')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('post-login', [AuthController::class, 'postLogin'])->name('post.login');
    // Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});


/*
|--------------------------------------------------------------------------
| Protected Routes (must be logged in)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->name('admin.')->group(function () {
    Route::get('admin', [AdminController::class, 'index'])->name('index');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
