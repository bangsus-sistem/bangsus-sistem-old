<?php

namespace Database\Seeders\Data;

use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('divisions')->insert(
            $this->parseData([
                [
                    'id' => 1,
                    'code' => 'OP',
                    'name' => 'Operasional',
                ],
                [
                    'id' => 2,
                    'code' => 'AC',
                    'name' => 'Akunting',
                ],
                [
                    'id' => 3,
                    'code' => 'FN',
                    'name' => 'Keuangan',
                ],
                [
                    'id' => 4,
                    'code' => 'GD',
                    'name' => 'Logistik',
                ],
                [
                    'id' => 5,
                    'code' => 'PB',
                    'name' => 'Pembelian',
                ],
                [
                    'id' => 6,
                    'code' => 'IT',
                    'name' => 'IT',
                ],
            ])
        );
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
