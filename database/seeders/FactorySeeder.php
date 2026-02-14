<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Factories;
use Illuminate\Support\Str;


class FactorySeeder extends Seeder
{
    public function run(): void
    {    
        $count = $this->command->ask('How many factories do you want to generate?', 50);

        \App\Models\Factories::factory()->count((int)$count)->create();
    }
}
