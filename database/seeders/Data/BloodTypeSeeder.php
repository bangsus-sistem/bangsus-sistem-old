<?php

namespace Database\Seeders\Data;

use Illuminate\Database\Seeder;

class BloodTypeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('blood_types')->insert(
            $this->parseData([
                [
                    'id' => 1,
                    'name' => 'A',
                ],
                [
                    'id' => 2,
                    'name' => 'B',
                ],
                [
                    'id' => 3,
                    'name' => 'AB',
                ],
                [
                    'id' => 4,
                    'name' => 'O',
                ],
            ])
        );
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
