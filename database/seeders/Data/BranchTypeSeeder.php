<?php

namespace Database\Seeders\Data;

use Illuminate\Database\Seeder;

class BranchTypeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('branch_types')->insert(
            $this->parseData(
                [
                    [
                        'id' => 1,
                        'code' => '10',
                        'name' => 'Pusat',
                    ],
                    [
                        'id' => 2,
                        'code' => '11',
                        'name' => 'Geprek Bangsus',
                    ],
                    [
                        'id' => 3,
                        'code' => '12',
                        'name' => 'Bangsus Lucky Duck',
                    ],
                    [
                        'id' => 4,
                        'code' => '13',
                        'name' => 'Saladetox',
                    ],
                    [
                        'id' => 5,
                        'code' => '14',
                        'name' => 'Bangsus Sayur',
                    ],
                    [
                        'id' => 6,
                        'code' => '15',
                        'name' => 'Udonkobe',
                    ],
                    [
                        'id' => 7,
                        'code' => '16',
                        'name' => 'Garangasem',
                    ],
                ]
            )
            
        );
    }

    /**
     * Parse the branch types data.
     * 
     * @param  array  $data
     * @return array
     */
    public function parseData(array $data)
    {
        $return = [];

        foreach ($data as $branchType) {
            $branchType['active'] = true;
            $branchType['locked'] = false;
            $branchType['hidden'] = false;
            $branchType['note'] = '';
            $branchType['description'] = '';
            $branchType['user_create_id'] = 1;
            $branchType['created_at'] = now();
            $return[] = $branchType;
        }

        return $return;
    }
}
