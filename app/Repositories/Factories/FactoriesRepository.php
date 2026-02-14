<?php

namespace App\Repositories\Factories;

use App\Models\Factories;
use App\Repositories\Base\BaseRepository;
use Illuminate\Support\Facades\DB;

class FactoriesRepository extends BaseRepository implements FactoriesRepositoryInterface
{
    public function __construct(Factories $model)
    {
        parent::__construct($model);
    }

    public function findByEmail(string $email)
    {
        return $this->model->where('email', $email)->first();
    }

    public function datatable(){
        return DB::table('users');
    }
}
