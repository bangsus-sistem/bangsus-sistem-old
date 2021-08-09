<?php

namespace Database\Seeders\Data;

use Waffleboss\Foundation\Database\ResourceSeeder;

class AddressTypeSeeder extends ResourceSeeder
{
    /**
     * @var string
     */
    protected $dataSource = 'address-type.json';

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('address_types')->insert(
            $this->parseData($this->data)
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
