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
        History::factory(10)->create(['user_id' => User::all()->random()->id]);
    }
}
