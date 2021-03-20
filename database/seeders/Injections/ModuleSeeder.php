<?php

namespace Database\Seeders\Injections;

use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->parseData([
            'auth' => [
                ['id' => '0001', 'ref' => 'package', 'name' => 'Package'],
                ['id' => '0002', 'ref' => 'module', 'name' => 'Modul'],
                ['id' => '0003', 'ref' => 'action', 'name' => 'Aksi'],
                ['id' => '0004', 'ref' => 'feature', 'name' => 'Fitur'],
                ['id' => '0005', 'ref' => 'widget', 'name' => 'Widget'],
                ['id' => '0006', 'ref' => 'role', 'name' => 'Role'],
                ['id' => '0007', 'ref' => 'user', 'name' => 'User'],
                ['id' => '0008', 'ref' => 'authentication_token', 'name' => 'Token Autentikasi'],
                ['id' => '0009', 'ref' => 'api_token', 'name' => 'Token API'],
            ],
            'logs' => [
                ['id' => '0001', 'ref' => 'authentication_log', 'name' => 'Log Autentikasi'],
                ['id' => '0002', 'ref' => 'feature_log', 'name' => 'Log Fitur'],
            ],
            'system' => [
                ['id' => '0001', 'ref' => 'branch_type', 'name' => 'Tipe Cabang'],
                ['id' => '0002', 'ref' => 'branch', 'name' => 'Cabang'],
            ]
        ]);
        \DB::table('modules')->insert($data);
    }

    /**
     * @param  array  $data
     * @return array
     */
    private function parseData($data)
    {
        $return = [];
        $packages = \DB::table('packages')->get();
        foreach ($data as $packageRef => $modules) {
            $package = $packages->firstWhere('ref', $packageRef);
            foreach ($modules as $module) {
                $return[] = [
                    'id' => (int) ((string) $package->id . $module['id']),
                    'package_id' => $package->id,
                    'ref' => $module['ref'],
                    'name' => $module['name'],
                ];
            }
        }
        return $return;
    }
}
