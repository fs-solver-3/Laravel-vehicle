<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Cars;

class UserCarSeeder extends Seeder
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
            DB::table('user_car')->insert([
                'user_id' => User::all()->random()->id,
                'car_id' => Cars::all()->random()->id,
            ]);
        }
    }
}
