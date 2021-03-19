<?php

namespace Database\Seeders\Data;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id' => 2,
                'code' => 'ADM',
                'name' => 'Admin',
                'features' => [
                    'role' => ['index', 'create', 'read', 'update', 'delete'],
                    'user' => ['index', 'create', 'read', 'update', 'delete'],
                    'authentication_token' => ['index', 'create', 'read', 'update', 'delete'],
                    'authentication_log' => ['index', 'read', 'delete'],
                    'feature_log' => ['index', 'read', 'delete'],
                    'branch_type' => ['index', 'create', 'read', 'update', 'delete'],
                    'branch' => ['index', 'create', 'read', 'update', 'delete'],
                ],
                'widgets' => [
                    'feature_log' => ['traffic'],
                    'authentication_log' => ['traffic', 'latest_data'],
                ],
            ],
            [
                'id' => 3,
                'code' => 'OWN',
                'name' => 'Pemilik',
                'features' => [
                    'authentication_token' => ['create', 'read', 'update', 'delete'],
                ],
            ],
            [
                'id' => 4,
                'code' => 'SPV',
                'name' => 'Supervisor',
                'features' => [
                    'authentication_token' => ['create', 'read', 'update', 'delete'],
                ],
            ],
            [
                'id' => 5,
                'code' => 'BRA',
                'name' => 'Cabang',
                'features' => [
                    'authentication_token' => ['create', 'read', 'update', 'delete'],
                ],
            ],
        ];
        \DB::table('roles')->insert($this->parseRole($roles));
        \DB::table('role_features')->insert($this->parseFeature($roles));
        \DB::table('role_widgets')->insert($this->parseWidget($role));
    }

    /**
     * @param  array  $data
     * @return array
     */
    private function parseRole($data)
    {
        $return = [];
        foreach ($data as $role) {
            $return[] = [
                'id' => $role['id'],
                'code' => $role['code'],
                'name' => $role['name'],
                'active' => true,
                'locked' => false,
                'all_access' => false,
                'all_widget' => false,
                'note' => '',
                'user_create_id' => 1,
                'created_at' => now(),
            ];
        }
        return $return;
    }

    /**
     * @param  array  $data
     * @return array
     */
    private function parseFeature($data)
    {
        $return = [];
        $modules = \DB::table('modules')->get();
        $actions = \DB::table('actions')->get();
        $features = \DB::table('features')->get();
        foreach ($data as $role) {
            foreach ($role['features'] as $moduleRef => $actionRefs) {
                foreach ($actionRefs as $actionRef) {
                    $module = $modules->firstWhere('ref', $moduleRef);
                    $action = $actions->firstWhere('ref', $actionRef);
                    $feature = $features->where('module_id', $module->id)
                        ->where('action_id', $action->id)
                        ->first();
                    $return[] = [
                        'id' => null,
                        'role_id' => $role['id'],
                        'feature_id' => $feature->id,
                        'access' => true,
                        'user_create_id' => 1,
                        'created_at' => now(),
                    ];
                }
            }
        }
        return $return;
    }

    /**
     * @param  array  $data
     * @return array
     */
    private function parseWidget($data)
    {
        $return = [];
        $modules = \DB::table('modules')->get();
        $widgetTypes = \DB::table('widget_types')->get();
        $widgets = \DB::table('widgets')->get();
        foreach ($data as $role) {
            foreach ($role['widgets'] as $moduleRef => $widgetTypeRefs) {
                foreach ($widgetTypeRefs as $widgetTypeRef) {
                    $module = $modules->firstWhere('ref', $moduleRef);
                    $widgetType = $widgetTypes->firstWhere('ref', $widgetTypeRef);
                    $widget = $widgets->where('module_id', $module->id)
                        ->where('widget_type_id', $widgetType->id)
                        ->first();
                    $return[] = [
                        'id' => null,
                        'role_id' => $role['id'],
                        'widget_id' => $widget->id,
                        'access' => true,
                        'user_create_id' => 1,
                        'created_at' => now(),
                    ];
                }
            }
        }
        return $return;
    }
}
