<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InjectionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::transaction(function () {
            $this->call([
                Injections\AuthorizationSeeder::class,
                Injections\UserRoleSeeder::class,
                Injections\ApiSeeder::class,
                Injections\GenderSeeder::class,
                Injections\TrialBalanceAccountGroupSeeder::class,
                Injections\ProfitLossAccountGroupSeeder::class,
                Injections\AccountTypeSeeder::class,
                Injections\AccountSeeder::class,
                Injections\ProductTypeSeeder::class,
            ]);
        });
    }
}
