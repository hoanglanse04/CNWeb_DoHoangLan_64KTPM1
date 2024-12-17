<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Tạo 100 bản ghi cho bảng movies
        for ($i = 0; $i < 100; $i++) {
            DB::table('movies')->insert([
                'title' => $faker->sentence,
                'director' => $faker->name,
                'release_date' => $faker->date,
                'duration' => $faker->numberBetween(90, 180),
                'cinema_id' => $faker->numberBetween(1, 100), // Giả sử bảng cinemas đã có 100 bản ghi
            ]);
        }
    }
}
