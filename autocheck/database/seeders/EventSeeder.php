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
        $events = Event::factory(10)->create();

        $vehicles = Vehicle::all();
        $events -> each(function ($e) use (&$vehicles) {
            $e -> vehicles() -> attach($vehicles -> random(rand(2, $vehicles->count())));
        });
    }
}
