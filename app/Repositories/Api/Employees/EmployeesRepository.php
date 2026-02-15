<?php

namespace App\Repositories\Api\Employees;

use App\Models\Employees;
use App\Repositories\Base\BaseRepository;
use App\Repositories\Api\Employees\EmployeesRepositoryInterface;

class EmployeesRepository extends BaseRepository implements EmployeesRepositoryInterface
{
    protected $model;

    public function __construct(Employees $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model->with('manufactory')->get();
    }
}
