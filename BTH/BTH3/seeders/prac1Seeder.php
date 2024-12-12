<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class prac1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Seed medicines table
        foreach (range(1, 20) as $index) {
            DB::table('medicines')->insert([
                'name' => $faker->word,
                'brand' => $faker->company,
                'dosage' => $faker->word,
                'form' => $faker->word,
                'price' => $faker->randomFloat(20, 10, 50, 100),
                'stock' => $faker->randomNumber(3),
            ]);
        }

        // Seed sales table
        foreach (range(1, 50) as $index) {
            DB::table('sales')->insert([
                'medicine_id' => $faker->numberBetween(1,20),
                'quanlity' => $faker->randomFloat(20, 10, 50, 100),
                'sale_date' => $faker->dateTimeBetween('-1 year', 'now'),
                'customer_phone' => $faker->phoneNumber,
            ]);
        }
    }
}
