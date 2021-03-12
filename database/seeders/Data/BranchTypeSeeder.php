<?php

namespace Database\Seeders\Data;

use Illuminate\Database\Seeder;

class BranchTypeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('branch_types')->insert([
            [
                'id' => 1,
                'code' => '10',
                'name' => 'Pusat',
                'active' => 1,
                'user_create_id' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'code' => '11',
                'name' => 'Geprek Bangsus',
                'active' => 1,
                'user_create_id' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 3,
                'code' => '12',
                'name' => 'Bangsus Lucky Duck',
                'active' => 1,
                'user_create_id' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 4,
                'code' => '13',
                'name' => 'Saladetox',
                'active' => 1,
                'user_create_id' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 5,
                'code' => '14',
                'name' => 'Bangsus Sayur',
                'active' => 1,
                'user_create_id' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 6,
                'code' => '15',
                'name' => 'Udonkobe',
                'active' => 1,
                'user_create_id' => 1,
                'created_at' => now(),
            ],
            [
                'id' => 7,
                'code' => '16',
                'name' => 'Garangasem',
                'active' => 1,
                'user_create_id' => 1,
                'created_at' => now(),
            ],
        ]);
    }
}
