<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehichle::factory()->create([
            'plate' => fake()->regexify('[a-zA-Z]{3}-?\d{3}'),
            'brand' => fake()->word(),
            'type' => fake()->word(),
            'year'=> fake()->year()
        ]);
    }
}
