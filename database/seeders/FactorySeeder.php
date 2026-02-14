<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Factories;
use Illuminate\Support\Str;


class FactorySeeder extends Seeder
{
    public function run(): void
    {
        $factories = [
            [
                'factory_name' => 'ABC Garments Manufacturing',
                'location' => 'Clark, Pampanga',
                'email' => 'abc@factory.com',
                'website' => 'https://abcgarments.com',
            ],
            [
                'factory_name' => 'Sunrise Textiles',
                'location' => 'Angeles City, Pampanga',
                'email' => 'sunrise@factory.com',
                'website' => 'https://sunrisetextiles.com',
            ],
            [
                'factory_name' => 'Golden Thread Industries',
                'location' => 'San Fernando, Pampanga',
                'email' => 'goldenthread@factory.com',
                'website' => 'https://goldenthread.com',
            ],
            [
                'factory_name' => 'Prime Clothing Corp',
                'location' => 'Mabalacat, Pampanga',
                'email' => 'prime@factory.com',
                'website' => null,
            ],
        ];

        foreach ($factories as $factory) {
            Factories::create($factory);
        }
    }
}
