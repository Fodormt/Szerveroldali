<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'plate' => fake()->regexify('[A-Z]{3}-\d{3}'),
            'brand' => fake()->word(),
            'type' => fake()->word(),
            'year'=> fake()->year('before:now'),
        ];
    }
}
