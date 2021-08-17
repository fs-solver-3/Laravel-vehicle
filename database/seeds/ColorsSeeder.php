<?php

use Illuminate\Database\Seeder;
use App\Models\Colors;

class ColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $items = [

            ['color' => '#FFFFFF',],
            ['color' => '#FDAB3E',],
            ['color' => '#09B983',],
            ['color' => '#41479B',],
            ['color' => '#EE6161',],
            ['color' => '#EC4343',],
            ['color' => '#95662F',],
            ['color' => '#C1C1C1',],
            ['color' => '#45AFE3',],
            ['color' => '#CAF8FF',],

        ];

        foreach ($items as $item) {
            Colors::create($item);
        }
    }
}
