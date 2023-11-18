<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\History;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HistorySeeder extends Seeder
{
    public function run(): void
    {
        for ($i=0; $i < 20; $i++) { 
            History::factory(1)->create(['user_id' => User::all()->random()->id]);
        }
    }
}
