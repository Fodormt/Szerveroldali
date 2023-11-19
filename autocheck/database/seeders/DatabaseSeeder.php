<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Database\Seeders\EventSeeder;
use Database\Seeders\HistroySeeder;
use Database\Seeders\VehicleSeeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'a@a.hu',
            'is_admin' => true,
            'is_premium' => true,
        ]);

        $this->call([
            VehicleSeeder::class,
            EventSeeder::class,
            HistorySeeder::class,
        ]);
    }
}
