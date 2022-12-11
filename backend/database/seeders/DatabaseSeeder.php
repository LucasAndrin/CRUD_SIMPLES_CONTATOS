<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\City;
use App\Models\Hobby;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        City::factory()
            ->count(10)
            ->has(
                User::factory()
                    ->has(Hobby::factory()->count(5), 'hobbies')
                    ->count(3),
                'users')
            ->create();
    }
}
