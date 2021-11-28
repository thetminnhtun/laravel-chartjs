<?php

namespace Database\Seeders;

use Faker\Factory;
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
        \App\Models\User::truncate();

        $startDate = now()->subMonths(18);

        while ($startDate->lessThanOrEqualTo(now())) {
            \App\Models\User::factory(rand(1, 3))->create([
                'created_at' => $startDate,
            ]);

            $startDate->addDay();
        }

    }
}
