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
        $modules = \DB::table('modules')->all();
        $actions = \DB::table('actions')->all();
        foreach ($data as $moduleRef => $actionRefs) {
            $module = $modules->firstWhere('ref', $moduleRef);
            foreach ($actionRefs as $actionRef) {
                $action = $actions->firstWhere('ref', $actionRef);
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
