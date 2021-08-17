<?php

use Illuminate\Database\Seeder;
use App\Models\CarModel;

class CarModelsSeeder extends Seeder
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

            ['name' => 'COROLLA',],
            ['name' => 'YARIS',],
            ['name' => 'AVENSIS',],
            ['name' => 'CAMRY',],
            ['name' => 'AURIS',]

        ];

        foreach ($items as $item) {
            CarModel::create($item);
        }
    }
}
