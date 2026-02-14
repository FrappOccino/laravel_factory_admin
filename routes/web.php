<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FactoriesController;
use App\Http\Controllers\UserController;
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
    Route::post('register', [AuthController::class, 'register'])->name('register');
});


/*
|--------------------------------------------------------------------------
| Protected Routes (must be logged in)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->name('admin.')->group(function () {
    Route::get('admin', [AdminController::class, 'index'])->name('index');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('admin/user', [UserController::class, 'index'])->name('user.index');
    Route::get('admin/user/datatable', [UserController::class, 'datatable'])->name('user.datatable');
    Route::get('admin/factories', [FactoriesController::class, 'index'])->name('factories.index');
    Route::get('admin/factories/datatable', [FactoriesController::class, 'datatable'])->name('factories.datatable');
});
