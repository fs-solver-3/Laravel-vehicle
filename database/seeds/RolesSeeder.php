<?php

use Illuminate\Database\Seeder;
use App\Models\Roles;
class RolesSeeder extends Seeder
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

            ['title' => 'Administrator',],
            ['title' => 'Content manager',],
            ['title' => 'Support employee',],
            ['title' => 'Simple user',],
            ['title' => 'Accountant',]

        ];

        foreach ($items as $item) {
            Roles::create($item);
        }
    }
}
