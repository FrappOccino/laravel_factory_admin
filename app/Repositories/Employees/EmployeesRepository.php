<?php

namespace App\Repositories\Employees;

use App\Models\Employees;
use App\Repositories\Base\BaseRepository;
use Illuminate\Support\Facades\DB;

class EmployeesRepository extends BaseRepository implements EmployeesRepositoryInterface
{
    protected $model;
    
    public function __construct(Employees $model)
    {
        // parent::__construct($model);
        $this->model = $model;
    }

    public function findByEmail(string $email)
    {
        return $this->model->where('email', $email)->first();
    }

    public function datatable(){

        $select = "SELECT * FROM lfa_employees ";

        $qry = DB::raw("({$select}) as employees");
        return DB::table($qry)->orderBy('id','desc');
    }
}
