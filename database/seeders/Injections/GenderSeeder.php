<?php

namespace Database\Seeders\Injections;

use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('genders')->insert(
            $this->parseData([
                [
                    'id' => 1,
                    'code' => 'L',
                    'name' => 'Laki-laki',
                ],
                [
                    'id' => 2,
                    'code' => 'P',
                    'name' => 'Perempuan',
                ],
            ])
        );
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
