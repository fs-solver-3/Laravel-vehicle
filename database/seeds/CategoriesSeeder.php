<?php

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['title' => 'A1', 'additional_info' => 'test',],
            ['title' => 'A2', 'additional_info' => 'test',],
            ['title' => 'A3', 'additional_info' => 'test',],
            ['title' => 'A4', 'additional_info' => 'test',],
            ['title' => 'A5', 'additional_info' => 'test',],
            ['title' => 'B1', 'additional_info' => 'test',],
            ['title' => 'B2', 'additional_info' => 'test',],
            ['title' => 'B3', 'additional_info' => 'test',],
            ['title' => 'B4', 'additional_info' => 'test',],
            ['title' => 'B5', 'additional_info' => 'test',]

        ];

        foreach ($items as $item) {
            DB::table('lisence_categories')->insert([
                'title' => $item['title'],
                'additional_info' => $item['additional_info'],
            ]);
        }
    }
}
