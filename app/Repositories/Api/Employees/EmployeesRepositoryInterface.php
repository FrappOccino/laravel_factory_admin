<?php

namespace App\Repositories\Api\Employees;

use App\Repositories\Base\BaseRepositoryInterface;

interface EmployeesRepositoryInterface extends BaseRepositoryInterface
{
    public function index();
}
