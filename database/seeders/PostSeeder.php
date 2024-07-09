<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {

            DB::table('posts')->insert([
                'title' => $faker->text(25),
                'image' => 'https://i1-vnexpress.vnecdn.net/2024/06/29/0aa0040adb5e7900204f-171962595-3091-8703-1719626024.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=JDyg3Ee4qQGoa3fMptig5w',
                'description' => $faker->text(50),
                'content' => $faker->text(),
                'view' => rand(1, 1000),
                'cate_id' => rand(1, 4)
            ]);
        }
    }
}
