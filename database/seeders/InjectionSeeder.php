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
        $this->call([
            Injections\PackageSeeder::class,
            Injections\ModuleSeeder::class,
            Injections\ActionSeeder::class,
            Injections\WidgetTypeSeeder::class,
            Injections\FeatureSeeder::class,
            Injections\WidgetSeeder::class,
            Injections\UserRoleSeeder::class,
        ]);
    }
}
