<?php

namespace App\Repositories\Employees;

use App\Repositories\Base\BaseRepositoryInterface;

interface EmployeesRepositoryInterface extends BaseRepositoryInterface
{
    public function findByEmail(string $email);
    public function datatable();
}
