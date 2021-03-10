<?php

namespace Database\Seeders\Injections;

use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('packages')->insert([
            ['id' => 10, 'ref' => 'auth', 'name' => 'Autentikasi'],
            ['id' => 11, 'ref' => 'logs', 'name' => 'Log'],
            ['id' => 12, 'ref' => 'system', 'name' => 'Sistem'],
        ]);
    }
}
