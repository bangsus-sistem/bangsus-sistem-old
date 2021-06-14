<?php

namespace Database\Seeders\Data;

use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('branches')->insert(
            $this->parseData(
                [
                    [
                        'code' => '100',
                        'name' => 'Kantor Pusat',
                        'branch_type_id' => 1,
                    ],
                    [
                        'code' => '100',
                        'name' => 'Geprek Bangsus Pusat',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '101',
                        'name' => 'Geprek Bangsus Semolowaru',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '102',
                        'name' => 'Geprek Bangsus Betro',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '103',
                        'name' => 'Geprek Bangsus Keputih',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '104',
                        'name' => 'Geprek Bangsus Ketegan',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '105',
                        'name' => 'Geprek Bangsus Menganti',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '106',
                        'name' => 'Geprek Bangsus Lontar',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '107',
                        'name' => 'Geprek Bangsus Gresik',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '108',
                        'name' => 'Geprek Bangsus Lamongan',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '109',
                        'name' => 'Geprek Bangsus Beji',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '110',
                        'name' => 'Geprek Bangsus Bangil',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '111',
                        'name' => 'Geprek Bangsus Pasuruan',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '112',
                        'name' => 'Geprek Bangsus Ngopak',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '113',
                        'name' => 'Geprek Bangsus Lawang',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '114',
                        'name' => 'Geprek Bangsus Singosari',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '115',
                        'name' => 'Geprek Bangsus Malang',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '116',
                        'name' => 'Geprek Bangsus Blimbing',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '117',
                        'name' => 'Geprek Bangsus Sawojajar',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '118',
                        'name' => 'Geprek Bangsus Mojosari',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '119',
                        'name' => 'Geprek Bangsus Mojokerto',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '120',
                        'name' => 'Geprek Bangsus Mojoagung',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '121',
                        'name' => 'Geprek Bangsus Jombang',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '122',
                        'name' => 'Geprek Bangsus Pare',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '123',
                        'name' => 'Geprek Bangsus Kediri Bandar',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '124',
                        'name' => 'Geprek Bangsus Wlingi',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '125',
                        'name' => 'Geprek Bangsus Nganjuk',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '126',
                        'name' => 'Geprek Bangsus Madiun',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '127',
                        'name' => 'Geprek Bangsus Ngawi',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '128',
                        'name' => 'Geprek Bangsus Kediri PK',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '129',
                        'name' => 'Geprek Bangsus Trenggalek',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '130',
                        'name' => 'Geprek Bangsus Ponorogo',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '131',
                        'name' => 'Geprek Bangsus Sumoroto',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '132',
                        'name' => 'Geprek Bangsus Pacitan',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '133',
                        'name' => 'Geprek Bangsus Solo Sukoharjo',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '134',
                        'name' => 'Geprek Bangsus Solo Ngemplak',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '135',
                        'name' => 'Geprek Bangsus Ciledug',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '136',
                        'name' => 'Geprek Bangsus Kuta',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '137',
                        'name' => 'Geprek Bangsus Curug',
                        'branch_type_id' => 2,
                    ],
                    [
                        'code' => '100',
                        'name' => 'Bangsus Lucky Duck Pusat',
                        'branch_type_id' => 3,
                    ],
                    [
                        'code' => '101',
                        'name' => 'Bangsus Lucky Duck Semolowaru',
                        'branch_type_id' => 3,
                    ],
                    [
                        'code' => '100',
                        'name' => 'Saladetox Pusat',
                        'branch_type_id' => 4,
                    ],
                    [
                        'code' => '101',
                        'name' => 'Saladetox Semolowaru',
                        'branch_type_id' => 4,
                    ],
                    [
                        'code' => '100',
                        'name' => 'Bangsus Sayur Pusat',
                        'branch_type_id' => 5,
                    ],
                    [
                        'code' => '101',
                        'name' => 'Bangsus Sayur Koala',
                        'branch_type_id' => 5,
                    ],
                    [
                        'code' => '102',
                        'name' => 'Bangsus Sayur Semolowaru',
                        'branch_type_id' => 5,
                    ],
                    [
                        'code' => '100',
                        'name' => 'Udonkobe Pusat',
                        'branch_type_id' => 6,
                    ],
                    [
                        'code' => '101',
                        'name' => 'Udonkobe Pare',
                        'branch_type_id' => 6,
                    ],
                    [
                        'code' => '102',
                        'name' => 'Udonkobe Nganjuk',
                        'branch_type_id' => 6,
                    ],
                    [
                        'code' => '100',
                        'name' => 'Garangasem Pusat',
                        'branch_type_id' => 7,
                    ],
                    [
                        'code' => '101',
                        'name' => 'Garangasem Kenjeran',
                        'branch_type_id' => 7,
                    ],
                ]
            )
        );
        \DB::statement('insert into branch_user select id, 1 from branches');
    }

    /**
     * @param  array  $branches
     * @return array
     */
    public function parseData($branches)
    {
        $return = [];
        $branchTypes = \DB::table('branch_types')->get();
        foreach ($branches as $branch)
        {
            $branchType = $branchTypes->firstWhere('id', $branch['branch_type_id']);
            $return[] = [
                'id' => null,
                'code' => $branchType->code . $branch['code'],
                'name' => $branch['name'],
                'branch_type_id' => $branchType->id,
                'active' => $branch['active'] ?? true,
                'locked' => false,
                'hidden' => false,
                'description' => '',
                'note' => '',
                'user_create_id' => 1,
                'created_at' => now(),
            ];
        }
        return $return;
    }
}
