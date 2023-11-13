<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'test@example.com',
        //     'is_admin' => true,
        //     'is_premium' => true,
        // ]);

        $this->call([
            EventSeeder::class,
            HistorySeeder::class,
            VehichleSeeder::class,
        ]);
    }
}
