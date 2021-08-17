<?php

use Illuminate\Database\Seeder;
use App\Models\CarBrand;
class CarBrandsSeeder extends Seeder
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

            ['name' => 'Toyoda',],
            ['name' => 'HYUNDAI',],
            ['name' => 'VAZ',],
            ['name' => 'VOLKSWAGEN',]

        ];

        foreach ($items as $item) {
            CarBrand::create($item);
        }
    }
}
