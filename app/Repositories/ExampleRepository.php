<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class ExampleRepository
{
    public function test(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $faker->email();
        }
    }
}
