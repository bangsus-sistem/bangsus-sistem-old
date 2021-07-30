<?php

namespace Database\Seeders\Injections;

use Illuminate\Database\Seeder;

class TrialBalanceAccountGroupSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('trial_balance_account_groups')->insert(
            [
                ['id' => 1, 'ref' => 'asset', 'name' => 'Aset'],
                ['id' => 2, 'ref' => 'liability_equity', 'name' => 'Liabilitas dan Ekuitas'],
            ]
        );
    }
}
