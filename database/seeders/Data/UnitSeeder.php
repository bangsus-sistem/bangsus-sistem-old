<?php

namespace Database\Seeders\Data;

use Waffleboss\Foundation\Database\ResourceSeeder;

class UnitSeeder extends ResourceSeeder
{
    /**
     * @var string
     */
    protected $dataSource = 'unit.json';

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('units')->insert($this->parseData($this->data));
    }

    /**
     * Parse the unit data.
     * 
     * @param  array  $data
     * @return array
     */
    private function parseData(array $data)
    {
        $return = [];

        foreach ($data as $unit) {
            $unit['active'] = true;
            $unit['description'] = '';
            $unit['note'] = '';
            $unit['user_create_id'] = 1;
            $unit['created_at'] = now();

            $return[] = $unit;
        }

        return $return;
    }
}
