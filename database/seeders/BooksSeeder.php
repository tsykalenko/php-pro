<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $chunkSize = 1000;
        $totalData = 100000;
        for ($i = 0; $i < $totalData; $i += $chunkSize) {
            for ($q = 0; $q < $chunkSize; $q++) {
                DB::table('books')->insert([
                    'name' => $faker->sentence,
                    'year' => $faker->numberBetween(1970, 2023),
                    'lang' => $faker->languageCode,
                    'pages' => $faker->numberBetween(10, 55000),
                    'category_id' => $faker->numberBetween(1, 200),
                ]);
            }
        }
    }
}

