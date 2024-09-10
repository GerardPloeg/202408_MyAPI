<?php

namespace Database\Seeders;

use app\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 25; $i++)
        {
            Book::create(['name' => $faker->sentence,
                          'author' => $faker->name,
                          'price' => $faker->randomFloat(2, 0, 100)]);
        }
    }
}
