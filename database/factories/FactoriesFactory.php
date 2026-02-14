<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FactoriesFactory extends Factory
{
    public function definition(): array
    {
        return [
            'factory_name' => $this->faker->company . ' Manufacturing',
            'location' => $this->faker->city,
            'email' => $this->faker->unique()->companyEmail,
            'website' => $this->faker->optional()->url,
        ];
    }
}
