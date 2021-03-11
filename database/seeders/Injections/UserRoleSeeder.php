<?php

namespace Database\Seeders\Injections;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->insert([
            [
                'id' => 1,
                'code' => 'SPA',
                'name' => 'Super Admin',
                'active' => true,
                'locked' => true,
                'all_access' => true,
                'note' => '',
                'created_at' => now(),
            ],
        ]);
        \DB::table('users')->insert([
            [
                'id' => 1,
                'username' => 'superadmin@bangsus',
                'password' => Hash::make('bangsus112233'),
                'full_name' => 'Super Admin Bangsus',
                'role_id' => 1,
                'active' => true,
                'locked' => true,
                'all_access' => true,
                'all_branch_access' => true,
                'note' => '',
                'created_at' => now(),
            ],
        ]);

        \DB::table('roles')->where('id', 1)
            ->update([
                'user_create_id' => 1
            ]);
        \DB::table('users')->where('id', 1)
            ->update([
                'user_create_id' => 1
            ]);
    }
}
