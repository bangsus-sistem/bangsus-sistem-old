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
            'authentication_log' => ['traffic'],
            'feature_log' => ['traffic', 'latest_data'],
        ]);
        \DB::table('widget_types')->insert($data);
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
        foreach ($data as $moduleRef => $widgetTypes) {
            $module = $modules->firstWhere('ref', $moduleRef);
            foreach ($widgetTypes as $widgetType) {
                $widgetType = $widgetTypes->firstWhere('ref', $widgetType);
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
