<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employees;
use App\Models\Factory as FactoryModel;
use App\Models\Factories;

class EmployeesFactory extends Factory
{
    // protected $model = Employees::class;

    public function definition(): array
    {
        return [
            'firstname'  => $this->faker->firstName(),
            'lastname'   => $this->faker->lastName(),
            'factory_id' => Factories::inRandomOrder()->value('id') ?? Factories::factory(),
            'email'      => $this->faker->unique()->safeEmail(),
            'phone'      => $this->faker->phoneNumber(),
        ];
    }
}
