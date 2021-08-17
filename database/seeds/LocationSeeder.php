<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('locations')->insert([
                'building' => $faker->buildingNumber,
                'street' => $faker->streetName,
                'city' => $faker->city,
                'state' => $faker->state,
                'zip' => $faker->postcode,
                'country' => $faker->country,
                'lat' => $faker->latitude,
                'lng' => $faker->longitude,
            ]);
        }
    }
}
