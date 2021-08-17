<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(UserPivotSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(CarSeeder::class);
        // $this->call(ListingsSeeder::class);
        $this->call(BodyTypeSeeder::class);
        $this->call(CargoTypeSeeder::class);
        // $this->call(RolePivotTableSeeder::class);
        // $this->call(BookingSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(CarBrandsSeeder::class);
        $this->call(CarModelsSeeder::class);
        $this->call(ColorsSeeder::class);
    }
}
