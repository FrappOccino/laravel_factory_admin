<?php

namespace App\Repositories\Factories;

use App\Repositories\Base\BaseRepositoryInterface;

interface FactoriesRepositoryInterface extends BaseRepositoryInterface
{
    public function findByEmail(string $email);
    public function datatable();
}
