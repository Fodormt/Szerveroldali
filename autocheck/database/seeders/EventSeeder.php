<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Event;
use App\Models\Vehicle;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::factory(10)->create(['user_id' => User::all()->random()->id]);
    }
}
