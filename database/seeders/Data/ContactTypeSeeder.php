<?php

namespace Database\Seeders\Data;

use Waffleboss\Foundation\Database\ResourceSeeder;

class ContactTypeSeeder extends ResourceSeeder
{
    /**
     * @var string
     */
    protected $dataSource = 'contact-type.json';

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('contact_types')->insert($this->parseData($this->data));
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

        foreach ($data as $contactType) {
            $contactType['active'] = true;
            $contactType['description'] = '';
            $contactType['note'] = '';
            $contactType['user_create_id'] = 1;
            $contactType['created_at'] = now();

            $return[] = $contactType;
        }

        return $return;
    }
}
