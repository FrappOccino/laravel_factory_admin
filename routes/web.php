<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\FactoriesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('admin.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Guest Routes 
|--------------------------------------------------------------------------
*/
Route::middleware(['guest'])->name('auth.')->group(function () {
    // Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('post-login', [AuthController::class, 'postLogin'])->name('post.login');
    Route::post('register', [AuthController::class, 'register'])->name('register');
});


/*
|--------------------------------------------------------------------------
| Protected Routes 
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->name('admin.')->group(function () {
    Route::get('admin', [AdminController::class, 'index'])->name('index');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('admin/user', [UserController::class, 'index'])->name('user.index');
    Route::get('admin/user/datatable', [UserController::class, 'datatable'])->name('user.datatable');

    // Factories
    Route::get('admin/factories', [FactoriesController::class, 'index'])->name('factories.index');
    Route::get('admin/factories/datatable', [FactoriesController::class, 'datatable'])->name('factories.datatable');
    Route::post('admin/factories/create', [FactoriesController::class, 'postCreate'])->name('factories.post.create');
    Route::get('admin/factories/create', [FactoriesController::class, 'create'])->name('factories.create');
    Route::get('admin/factories/edit/{id}', [FactoriesController::class, 'update'])->name('factories.update');
    Route::post('admin/factories/edit/', [FactoriesController::class, 'postUpdate'])->name('factories.post.update');
    Route::delete('admin/factories/{id}', [FactoriesController::class, 'delete'])->name('factories.delete');
    
    // Employees
    Route::get('admin/employees', [EmployeesController::class, 'index'])->name('employees.index');
    Route::get('admin/employees/datatable', [EmployeesController::class, 'datatable'])->name('employees.datatable');
    Route::post('admin/employees/create', [EmployeesController::class, 'postCreate'])->name('employees.post.create');
    Route::get('admin/employees/create', [EmployeesController::class, 'create'])->name('employees.create');
    Route::get('admin/employees/edit/{id}', [EmployeesController::class, 'update'])->name('employees.update');
    Route::put('admin/employees/edit/', [EmployeesController::class, 'postUpdate'])->name('employees.post.update');
    Route::delete('admin/employees/{id}', [EmployeesController::class, 'delete'])->name('employees.delete');

});

require __DIR__.'/auth.php';
