<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Tạo 100 bản ghi cho bảng libraries
        for ($i = 0; $i < 100; $i++) {
            DB::table('libraries')->insert([
                'name' => $faker->company,
                'address' => $faker->address,
                'contact_number' => $faker->phoneNumber,
            ]);
        }
    }
}
