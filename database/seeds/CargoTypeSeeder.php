<?php

use Illuminate\Database\Seeder;
use App\Models\CargoTypes;
class CargoTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['type_name' => 'Обычный',],
            ['type_name' => 'Ценный',],
            ['type_name' => 'Габаритный',],
            ['type_name' => 'Негабаритный',],
            ['type_name' => 'Скоропортящиеся',],
            ['type_name' => 'Сборный',],
            ['type_name' => 'Опасный',]

        ];

        foreach ($items as $item) {
            CargoTypes::create($item);
        }
    }
}
