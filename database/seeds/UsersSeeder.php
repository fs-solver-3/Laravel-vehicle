<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersSeeder extends Seeder
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

            ['name' => 'Admin', 'email' => 'admin@admin.com', 'password' => bcrypt('admin1234'), 'remember_token' => '', 'phone' => '+79260407007', 'isVerified' => true, 'active' => true],

        ];

        foreach ($items as $item) {
            User::create($item);
        }
    }
}
