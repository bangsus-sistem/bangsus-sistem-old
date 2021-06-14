<?php

namespace Database\Seeders\Data;

use Illuminate\Database\Seeder;

class ContactTypeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('contact_types')->insert(
            $this->parseData([
                [
                    'id' => 1,
                    'code' => 'PRI',
                    'name' => 'No. Pribadi',
                    'required' => false,
                ],
                [
                    'id' => 2,
                    'code' => 'RMH',
                    'name' => 'No. Rumah',
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
