<?php

namespace App\Providers;

use App\Repositories\Factories\FactoriesRepository;
use App\Repositories\Factories\FactoriesRepositoryInterface;
use App\Repositories\Employees\EmployeesRepository;
use App\Repositories\Employees\EmployeesRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(FactoriesRepositoryInterface::class, FactoriesRepository::class);
        $this->app->bind(EmployeesRepositoryInterface::class, EmployeesRepository::class);
    }
}
