<?php

namespace Database\Seeders\Injections;

use Illuminate\Database\Seeder;

class AuthorizationSeeder extends Seeder
{
    /**
     * @var array
     */
    private $actions = [
        ['ref' => 'index', 'name' => 'Index'],
        ['ref' => 'create', 'name' => 'Create'],
        ['ref' => 'read', 'name' => 'Read'],
        ['ref' => 'update', 'name' => 'Update'],
        ['ref' => 'post', 'name' => 'Post'],
        ['ref' => 'delete', 'name' => 'Delete'],
    ];

    /**
     * @var array
     */
    private $packages = [
        [
            'ref' => 'authentication',
            'name' => 'Authentication',
            'modules' => [
                [
                    'ref' => 'package',
                    'name' => 'Package',
                    'actions' => ['index', 'read'],
                ],
                [
                    'ref' => 'module',
                    'name' => 'Modul',
                    'actions' => ['index', 'read'],
                ],
                [
                    'ref' => 'action',
                    'name' => 'Aksi',
                    'actions' => ['index', 'read'],
                ],
                [
                    'ref' => 'feature',
                    'name' => 'Fitur',
                    'actions' => ['index', 'read'],
                ],
                [
                    'ref' => 'widget',
                    'name' => 'Widget',
                    'actions' => ['index', 'read'],
                ],
                [
                    'ref' => 'report',
                    'name' => 'Report',
                    'actions' => ['index', 'read'],
                ],
                [
                    'ref' => 'role',
                    'name' => 'Role',
                    'actions' => ['index', 'create', 'read', 'update', 'delete'],
                ],
                [
                    'ref' => 'user',
                    'name' => 'User',
                    'actions' => ['index', 'create', 'read', 'update', 'delete'],
                ],
            ],
            'widgets' => [],
            'reports' => [],
        ],
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $actions = $this->actions;
        \DB::table('actions')->insert($actions);

        $packages = $this->parsePackages();
        \DB::table('packages')->insert($packages);

        $modules = $this->parseModules();
        \DB::table('modules')->insert($modules);

        $features = $this->parseFeatures();
        \DB::table('features')->insert($features);

        $widgets = $this->parseWidgets();
        \DB::table('widgets')->insert($widgets);

        $reports = $this->parseReports();
        \DB::table('reports')->insert($reports);
    }

    /**
     * Parse Packages.
     * 
     * @return array
     */
    private function parsePackages()
    {
        $parsedPackages = [];
        foreach ($this->packages as $package)
            $parsedPackages[] = [
                'ref' => $package['ref'],
                'name' => $package['name'],
            ];

        return $parsedPackages;
    }

    /**
     * Parse Modules.
     * 
     * @return array
     */
    private function parseModules()
    {
        $packages = \DB::table('packages')->get();

        $parsedModules = [];
        foreach ($this->packages as $package) {
            $packageRef = $package['ref'];
            $modules = $package['modules'];
            $package = with(clone $packages)
                ->where('ref', $packageRef)->first();

            foreach ($modules as $module) {
                $parsedModules[] = [
                    'ref' => $module['ref'],
                    'name' => $module['name'],
                    'package_id' => $package->id,
                ];
            }
        }

        return $parsedModules;
    }

    /**
     * Parse Features.
     * 
     * @return array
     */
    private function parseFeatures()
    {
        $modules = \DB::table('modules')->get();
        $actions = \DB::table('actions')->get();

        $parsedFeatures = [];
        foreach ($this->packages as $package)
            foreach ($package['modules'] as $module)
                foreach ($module['actions'] as $action) {
                    $moduleMdl = with(clone $modules)
                        ->where('ref', $module['ref'])->first();
                    $action = with(clone $actions)
                        ->where('ref', $action)->first();

                    $parsedFeatures[] = [
                        'module_id' => $moduleMdl->id,
                        'action_id' => $action->id,
                    ];
                }

        return $parsedFeatures;
    }

    /**
     * Parse Widgets.
     */
    private function parseWidgets()
    {
        $packages = \DB::table('packages')->get();

        $parsedWidgets = [];
        foreach ($this->packages as $package) {
            $packageRef = $package['ref'];
            $widgets = $package['widgets'];
            $package = with(clone $packages)
                ->where('ref', $packageRef)->first();

            foreach ($widgets as $widget) {
                $parsedWidgets[] = [
                    'ref' => $widget['ref'],
                    'name' => $widget['name'],
                    'package_id' => $package->id,
                ];
            }
        }

        return $parsedWidgets;
    }

    /**
     * Parse Reports.
     */
    private function parseReports()
    {
        $packages = \DB::table('packages')->get();

        $parsedReports = [];
        foreach ($this->packages as $package) {
            $packageRef = $package['ref'];
            $reports = $package['reports'];
            $package = with(clone $packages)
                ->where('ref', $packageRef)->first();

            foreach ($reports as $report) {
                $parsedReports[] = [
                    'ref' => $report['ref'],
                    'name' => $report['name'],
                    'package_id' => $package->id,
                ];
            }
        }

        return $parsedReports;
    }
}
