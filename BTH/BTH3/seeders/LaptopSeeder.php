<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class LaptopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Tạo 100 bản ghi cho bảng laptops
        for ($i = 0; $i < 100; $i++) {
            DB::table('laptops')->insert([
                'brand' => $faker->word,
                'model' => $faker->word,
                'specifications' => $faker->sentence,
                'rental_status' => $faker->randomElement([0, 1]),
                'renter_id' => $faker->numberBetween(1, 100), // Giả sử bảng renters đã có 100 bản ghi
            ]);
        }
    }
}
