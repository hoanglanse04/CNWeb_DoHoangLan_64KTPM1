<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class prac2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Seed classes table
        foreach (range(1, 20) as $index) {
            DB::table('classes')->insert([
                'grade_level' => $faker->randomElement(['Pre-K', 'Kindergarten']),
                'room_number' => $faker->randomElement(['VH1', 'VH2', 'VH3', 'VH4', 'VH5']),
            ]);
        }

        // Seed students table
        foreach (range(1, 100) as $index) {
            DB::table('students')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $faker->date,
                'parent_phone' => $faker->phoneNumber,
                'class_id' => $faker->numberBetween(1,20), // Assuming 5 classes are created
            ]);
        }
    }

}
