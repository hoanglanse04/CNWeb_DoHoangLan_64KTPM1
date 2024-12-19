<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class IssuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            DB::table('issues')->insert([
                'computer_id' => $faker->numberBetween(1,50),
                'report_by' => $faker->name,
                'report_date' => $faker->dateTimeBetween('-3 month', 'now'),
                'description' => $faker->sentence,
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Open', 'Inprogress', 'Resolved']),
            ]);
        }
    }
}
