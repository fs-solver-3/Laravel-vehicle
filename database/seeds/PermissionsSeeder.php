<?php

use Illuminate\Database\Seeder;
use App\Models\Permissions;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['title' => 'user_management_access',],
            ['title' => 'user_management_create',],
            ['title' => 'user_management_edit',],
            ['title' => 'user_management_view',],
            ['title' => 'user_management_delete',],
            ['title' => 'permission_access',],
            ['title' => 'permission_create',],
            ['title' => 'permission_edit',],
            ['title' => 'permission_view',],
            ['title' => 'permission_delete',],
            ['title' => 'role_access',],
            ['title' => 'role_create',],
            ['title' => 'role_edit',],
            ['title' => 'role_view',],
            ['title' => 'role_delete',],
            ['title' => 'user_access',],
            ['title' => 'user_create',],
            ['title' => 'user_edit',],
            ['title' => 'user_view',],
            ['title' => 'user_delete',],
            ['title' => 'event_access',],
            ['title' => 'blog_access',],
            ['title' => 'post_access',],
            ['title' => 'test_delete',],
            ['title' => 'transaction_access',],
            ['title' => 'chat_access',],
            ['title' => 'trip_access',],
            ['title' => 'support_access',],
            ['title' => 'review_access',],
            ['title' => 'cars_access',],
            ['title' => 'content_access',],
            ['title' => 'passport_access',],
            ['title' => 'dashboard_access',]

        ];

        foreach ($items as $item) {
            Permissions::create($item);
        }
    }
}
