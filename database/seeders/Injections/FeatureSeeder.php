<?php

namespace Database\Seeders\Injections;

use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->parseData([
            'package' => ['index', 'read'],
            'module' => ['index', 'read'],
            'action' => ['index', 'read'],
            'feature' => ['index', 'read'],
            'role' => ['index', 'create', 'read', 'update', 'delete'],
            'user' => ['index', 'create', 'read', 'update', 'delete'],
            'authentication_token' => ['index', 'create', 'read', 'update', 'delete'],
            'role' => ['index', 'create', 'read', 'update', 'delete'],
            'authentication_log' => ['index', 'read', 'delete'],
            'feature_log' => ['index', 'read', 'delete'],
            'branch_type' => ['index', 'create', 'read', 'update', 'delete'],
            'branch' => ['index', 'create', 'read', 'update', 'delete'],
        ]);
        \DB::table('features')->insert($data);
    }

    /**
     * @param  array  $data
     * @return array
     */
    private function parseData($data)
    {
        $return = [];
        foreach ($data as $moduleRef => $actionRefs) {
            $module = \DB::table('modules')->where('ref', $moduleRef)->first();
            foreach ($actionRefs as $actionRef) {
                $action = \DB::table('actions')->where('ref', $actionRef)->first();
                $return[] = [
                    'id' => null,
                    'module_id' => $module->id,
                    'action_id' => $action->id,
                ];
            }
        }
        return $return;
    }
}
