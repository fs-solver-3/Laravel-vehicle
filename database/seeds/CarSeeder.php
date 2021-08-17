<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\User;
class CarSeeder extends Seeder
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
        foreach (range(1, 5) as $index) {
            DB::table('cars')->insert([
                'model' => $faker->word,
                'name' => $faker->word,
                'color' => $faker->colorName,
                'year' => $faker->year,
                'type' => $faker->word,
                'number' => $faker->word,
                'body_type' => $faker->word,
                'user_id' => User::all()->random()->id,
            ]);
        }
    }
}
