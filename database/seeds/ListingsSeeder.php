<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\User;
use App\Models\Locations;
use App\Models\Cars;
class ListingsSeeder extends Seeder
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
            DB::table('listings')->insert([
                'user_id' => User::all()->random()->id,
                'location_id' => Locations::all()->random()->id,
                'destination_id' => Locations::all()->random()->id,
                'car_id' => Cars::all()->random()->id,
                'starting_date' => $faker->dateTime,
                'max_occupants' => $faker->randomDigit,
                'additional_info' => $faker->sentence,
                'price_per_seat' => $faker->randomDigit,
                'time' => $faker->randomDigit,
                'distance' => 100,
                'active' => true,
            ]);
        }
    }
}