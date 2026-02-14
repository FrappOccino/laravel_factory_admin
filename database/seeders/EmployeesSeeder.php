<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employees;

class EmployeesSeeder extends Seeder
{
    public function run(): void
    {
        $count = $this->command->ask('How many Employees do you want to generate?', 50);

        Employees::factory()->count((int)$count)->create();
    }
}
