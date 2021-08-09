<?php

namespace Database\Seeders\Data;

use Waffleboss\Foundation\Database\ResourceSeeder;

class RoleSeeder extends ResourceSeeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->insert($this->parseRole($this->data));
        \DB::table('role_feature')->insert($this->parseFeature($this->data));
        \DB::table('role_widget')->insert($this->parseWidget($this->data));
        \DB::table('role_report')->insert($this->parseReport($this->data));
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
