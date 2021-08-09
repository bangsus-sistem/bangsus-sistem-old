<?php

namespace Database\Seeders\Data;

use Waffleboss\Foundation\Database\ResourceSeeder;

class DivisionSeeder extends ResourceSeeder
{
    /**
     * @var string
     */
    protected $dataSource = 'division.json';

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('divisions')->insert($this->parseData($this->data));
    }

    /**
     * Parse the division data.
     * 
     * @param  array  $data
     * @return array
     */
    private function parseData(array $data)
    {
        $return = [];

        foreach ($data as $division) {
            $division['active'] = true;
            $division['description'] = '';
            $division['note'] = '';
            $division['user_create_id'] = 1;
            $division['created_at'] = now();

            $return[] = $division;
        }

        return $return;
    }
}
