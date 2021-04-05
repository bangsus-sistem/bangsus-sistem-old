<?php

namespace Database\Seeders\Injections;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ApiSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('entry_points')->insert([
            'id' => 1,
            'code' => 'WEB',
            'name' => 'Web SPA',
            'token' => 'bsb-6061bcabfe7d290142605',
            'pin' => '290900',
            'user_create_id' => 1,
            'created_at' => Carbon::now(),
        ]);
        \DB::table('bearer_tokens')->insert([
            'id' => 1,
            'entry_point_id' => 1,
            'token' => 'bsb-60681bcabf7d29014260560681bcabfe7d290142605bfe',
            'created_at' => Carbon::now(),
            'expired_at' => Carbon::now()->addYears(10),
        ]);
        \DB::table('api_tokens')->insert([
            'id' => 1,
            'bearer_token_id' => 1,
            'user_id' => 1,
            'token' => 'bsb-60681bcabfe7d29014260560681bcabfe7d29142605bf90142656068bca61bcabfe7d29',
            'created_at' => Carbon::now(),
            'expired_at' => Carbon::now()->addYears(10),
        ]);
    }
}
