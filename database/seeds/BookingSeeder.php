<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Listings;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 5) as $index) {
            DB::table('bookings')->insert([
                'user_id' => User::all()->random()->id,
                'listing_id' => Listings::all()->random()->id,
                'total_people' => $faker->randomNumber(),
                'status' => $faker->word,
                'additional_info' => $faker->sentence,
                'type' => 1,
                'active' => true
            ]);
        }
    }
}
