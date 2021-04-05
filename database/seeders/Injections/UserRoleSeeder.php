<?php

namespace Database\Seeders\Injections;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

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
            'id' => 1,
            'code' => 'SPA',
            'name' => 'Superadmin',
            'active' => true,
            'locked' => true,
            'hidden' => true,
            'all_features' => true,
            'all_widgets' => true,
            'all_reports' => true,
            'created_at' => Carbon::now(),
        ]);
        \DB::statement('insert into role_feature select 1, id from features');
        \DB::statement('insert into role_widget select 1, id from widgets');
        \DB::statement('insert into role_report select 1, id from reports');
        \DB::table('users')->insert([
            'id' => 1,
            'username' => 'superadmin@bangsus',
            'password' => Hash::make('bangsus112233'),
            'full_name' => 'Bangsus Superadmin',
            'role_id' => 1,
            'active' => true,
            'locked' => true,
            'hidden' => true,
            'all_branches' => true,
            'user_create_id' => 1,
            'created_at' => Carbon::now(),
        ]);
        \DB::statement('insert into branch_user select id, 1 from branches');

        \DB::table('roles')->where('id', 1)->update([
            'user_create_id' => 1,
        ]);
    }
}
