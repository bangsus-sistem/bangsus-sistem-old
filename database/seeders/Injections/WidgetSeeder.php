<?php

namespace Database\Seeders\Injections;

use Illuminate\Database\Seeder;

class WidgetSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->parseData([
            'authentication_log' => ['traffic', 'latest_data'],
            'feature_log' => ['traffic', 'latest_data'],
        ]);
        \DB::table('widgets')->insert($data);
    }

    /**
     * @param  array  $data
     * @return array
     */
    private function parseData($data)
    {
        $return = [];
        $modules = \DB::table('modules')->get();
        $widgetTypes = \DB::table('widget_types')->get();
        foreach ($data as $moduleRef => $widgetTypeRefs) {
            $module = $modules->firstWhere('ref', $moduleRef);
            foreach ($widgetTypeRefs as $widgetTypeRef) {
                $widgetType = $widgetTypes->firstWhere('ref', $widgetTypeRef);
                $return[] = [
                    'id' => null,
                    'module_id' => $module->id,
                    'widget_type_id' => $widgetType->id,
                ];
            }
        }
        return $return;
    }
}
