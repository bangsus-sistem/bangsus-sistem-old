<?php

namespace Database\Seeders\Data;

use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('units')->insert(
            $this->parseData([
                [
                    'id' => 1,
                    'code' => 'PCS',
                    'name' => 'Pcs',
                ],
                [
                    'id' => 2,
                    'code' => 'KG',
                    'name' => 'Kilogram',
                ],
                [
                    'id' => 3,
                    'code' => 'GR',
                    'name' => 'Gram',
                ],
                [
                    'id' => 4,
                    'code' => 'LTR',
                    'name' => 'Liter',
                ],
                [
                    'id' => 5,
                    'code' => 'ML',
                    'name' => 'Mililiter',
                ],
                [
                    'id' => 6,
                    'code' => 'SAK',
                    'name' => 'Sak',
                ],
                [
                    'id' => 7,
                    'code' => 'DUS',
                    'name' => 'Dus',
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
