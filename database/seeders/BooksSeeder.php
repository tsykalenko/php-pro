<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $chunkSize = 2500;
        $totalData = 1000000;
        $output = new ConsoleOutput();
        $progress = new ProgressBar($output, $totalData);
        $progress->setFormat('verbose');
        $progress->start();
        $data = [1];
        $lang = [
            0 => 'en',
            1 => 'ua',
            2 => 'pl',
            3 => ' de',
        ];
        for ($i = 0; $i < $totalData; $i += $chunkSize) {
            for ($y = 0; $y < 5; $y++) {
                $data[] = [
                    'name' => $faker->sentence,
                    'year' => $faker->numberBetween(1970, 2023),
                    'Lang' => $lang[mt_rand(0, 3)],
                    'pages' => $faker->numberBetween(10, 55000),
                    'category_id' => $faker->numberBetween(1, 200)
                ];
                $progress->advance();
                DB:: table('books')
                    ->insert($data);
            }
        }
        $progress->finish();
    }
}
