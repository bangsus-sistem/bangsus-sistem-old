<?php

namespace Database\Seeders\Injections;

use Illuminate\Database\Seeder;

class WidgetTypeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('widget_types')->insert([
            ['id' => 1, 'ref' => 'traffic', 'name' => 'Traffic'],
            ['id' => 2, 'ref' => 'latest_data', 'name' => 'Data Terakhir'],
        ]);
    }
}
