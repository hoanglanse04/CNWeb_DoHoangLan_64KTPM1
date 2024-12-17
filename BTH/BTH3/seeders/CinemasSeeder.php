<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class CinemasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Tạo 100 bản ghi cho bảng cinemas
        for ($i = 0; $i < 100; $i++) {
            DB::table('cinemas')->insert([
                'name' => $faker->company,
                'location' => $faker->address,
                'total_seats' => $faker->numberBetween(50, 500),
            ]);
        }
    }
}
