<?php

namespace Database\Seeders\Injections;

use Illuminate\Database\Seeder;

class ActionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('actions')->insert([
            ['id' => 1, 'ref' => 'index', 'name' => 'Index'],
            ['id' => 2, 'ref' => 'create', 'name' => 'Tambah'],
            ['id' => 3, 'ref' => 'read', 'name' => 'Lihat'],
            ['id' => 4, 'ref' => 'update', 'name' => 'Ubah'],
            ['id' => 5, 'ref' => 'delete', 'name' => 'Hapus'],
        ]);
    }
}
