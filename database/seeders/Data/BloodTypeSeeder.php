<?php

namespace Database\Seeders\Data;

use Waffleboss\Foundation\Database\ResourceSeeder;

class BloodTypeSeeder extends ResourceSeeder
{
    /**
     * @var string
     */
    protected $dataSource = 'blood-type.json';

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('blood_types')->insert($this->parseData($this->data));
    }

    /**
     * Parse the blood type data.
     * 
     * @param  array  $data
     * @return array
     */
    private function parseData(array $data)
    {
        $return = [];

        foreach ($data as $bloodType) {
            $bloodType['active'] = true;
            $bloodType['description'] = '';
            $bloodType['note'] = '';
            $bloodType['user_create_id'] = 1;
            $bloodType['created_at'] = now();

            $return[] = $bloodType;
        }

        return $return;
    }
}
