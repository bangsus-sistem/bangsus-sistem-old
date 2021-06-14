<?php

namespace Database\Seeders\Data;

use Illuminate\Database\Seeder;

class AddressTypeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('address_types')->insert(
            $this->parseData([
                [
                    'id' => 1,
                    'code' => 'KTP',
                    'name' => 'Alamat KTP',
                    'required' => true,
                ],
                [
                    'id' => 2,
                    'code' => 'DOM',
                    'name' => 'Alamat Domisili',
                    'required' => false,
                ],
                [
                    'id' => 3,
                    'code' => 'IDK',
                    'name' => 'Alamat Kos',
                    'required' => false,
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

        foreach ($data as $addressType) {
            $addressType['active'] = true;
            $addressType['description'] = '';
            $addressType['note'] = '';
            $addressType['user_create_id'] = 1;
            $addressType['created_at'] = now();

            $return[] = $addressType;
        }

        return $return;
    }
}
