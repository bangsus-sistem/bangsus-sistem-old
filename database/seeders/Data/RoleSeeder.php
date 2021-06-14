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
                    'branch_type' => ['index', 'create', 'read', 'update', 'delete'],
                    'branch' => ['index', 'create', 'read', 'update', 'delete'],
                ],
                'widgets' => [],
                'reports' => [],
            ],
            [
                'id' => 3,
                'code' => 'OWN',
                'name' => 'Pemilik',
                'features' => [],
                'widgets' => [],
                'reports' => [],
            ],
            [
                'id' => 4,
                'code' => 'SPV',
                'name' => 'Supervisor',
                'features' => [],
                'widgets' => [],
                'reports' => [],
            ],
            [
                'id' => 5,
                'code' => 'BRA',
                'name' => 'Cabang',
                'features' => [],
                'widgets' => [],
                'reports' => [],
            ],
        ];
        \DB::table('roles')->insert($this->parseRole($roles));
        \DB::table('role_feature')->insert($this->parseFeature($roles));
        \DB::table('role_widget')->insert($this->parseWidget($roles));
        \DB::table('role_report')->insert($this->parseReport($roles));
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
                'hidden' => false,
                'all_features' => false,
                'all_widgets' => false,
                'all_reports' => false,
                'description' => '',
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
                        'role_id' => $role['id'],
                        'feature_id' => $feature->id,
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
        $widgets = \DB::table('widgets')->get();
        foreach ($data as $role) {
            foreach ($role['widgets'] as $widgetRefs) {
                foreach ($widgetRefs as $widgetRef) {
                    $widget = $widgets->where('ref', $widgetRef)
                        ->first();
                    $return[] = [
                        'role_id' => $role['id'],
                        'widget_id' => $widget->id,
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
    private function parseReport($data)
    {
        $return = [];
        $reports = \DB::table('reports')->get();
        foreach ($data as $role) {
            foreach ($role['reports'] as $reportRefs) {
                foreach ($reportRefs as $reportRef) {
                    $report = $reports->where('ref', $reportRef)
                        ->first();
                    $return[] = [
                        'role_id' => $role['id'],
                        'report_id' => $report->id,
                    ];
                }
            }
        }
        return $return;
    }
}
