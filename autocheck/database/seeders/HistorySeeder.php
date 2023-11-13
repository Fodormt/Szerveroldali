<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HistorySeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $rand = array_rand($users);

        History::factory()->create([
            'location' => fake()->name,
            'userid'=> $users[$rand],
            'description' => fake()->text(),
        ]);
    }
}
