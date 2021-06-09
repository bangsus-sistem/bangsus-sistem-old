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
            'name' => 'Autentikasi',
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
            'widgets' => [
                [
                    'ref' => 'users_overview',
                    'name' => 'Overview User',
                ]
            ],
            'reports' => [
                [
                    'ref' => 'roles_detail',
                    'name' => 'Detail Role',
                ],
                [
                    'ref' => 'users_detail',
                    'name' => 'Detail User',
                ],
            ],
        ],
        [
            'ref' => 'system',
            'name' => 'Sistem',
            'modules' => [
                [
                    'ref' => 'branch_type',
                    'name' => 'Tipe Cabang',
                    'actions' => ['index', 'create', 'read', 'update', 'delete'],
                ],
                [
                    'ref' => 'branch',
                    'name' => 'Cabang',
                    'actions' => ['index', 'create', 'read', 'update', 'delete'],
                ],
            ],
            'widgets' => [],
            'reports' => [],
        ],
        [
            'ref' => 'master',
            'name' => 'Master',
            'modules' => [
                [
                    'ref' => 'unit',
                    'name' => 'Satuan',
                    'actions' => ['index', 'create', 'read', 'update', 'delete'],
                ],
            ],
            'widgets' => [],
            'reports' => [],
        ],
        [
            'ref' => 'hrm',
            'name' => 'HRM',
            'modules' => [
                [
                    'ref' => 'contact_type',
                    'name' => 'Tipe Kontak',
                    'actions' => ['index', 'create', 'read', 'update', 'delete'],
                ],
                [
                    'ref' => 'address_type',
                    'name' => 'Tipe Alamat',
                    'actions' => ['index', 'create', 'read', 'update', 'delete'],
                ],
                [
                    'ref' => 'employee_photo_type',
                    'name' => 'Tipe Foto Karyawan',
                    'actions' => ['index', 'create', 'read', 'update', 'delete'],
                ],
                [
                    'ref' => 'gender',
                    'name' => 'Gender',
                    'actions' => ['index', 'create', 'read', 'update', 'delete'],
                ],
                [
                    'ref' => 'division',
                    'name' => 'Divisi',
                    'actions' => ['index', 'create', 'read', 'update', 'delete'],
                ],
                [
                    'ref' => 'job_title',
                    'name' => 'Jabatan',
                    'actions' => ['index', 'create', 'read', 'update', 'delete'],
                ],
                [
                    'ref' => 'attendance_type',
                    'name' => 'Tipe Absensi',
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
        foreach ($this->packages as ['ref' => $ref, 'name' => $name])
            $parsedPackages[] = [
                'ref' => $ref,
                'name' => $name,
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
        foreach ($this->packages as ['ref' => $ref, 'modules' => $modules]) {
            $packageRef = $ref;
            $package = with(clone $packages)
                ->where('ref', $packageRef)->first();

            foreach ($modules as ['ref' => $ref, 'name' => $name]) {
                $parsedModules[] = [
                    'ref' => $ref,
                    'name' => $name,
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
            foreach ($package['modules'] as ['ref' => $ref, 'actions' => $actionsArr])
                foreach ($actionsArr as $actionRef) {
                    $module = with(clone $modules)
                        ->where('ref', $ref)->first();
                    $action = with(clone $actions)
                        ->where('ref', $actionRef)->first();

                    $parsedFeatures[] = [
                        'module_id' => $module->id,
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
        foreach ($this->packages as ['ref' => $ref, 'widgets' => $widgets]) {
            $package = with(clone $packages)
                ->where('ref', $ref)->first();

            foreach ($widgets as ['ref' => $ref, 'name' => $name]) {
                $parsedWidgets[] = [
                    'ref' => $ref,
                    'name' => $name,
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
        foreach ($this->packages as ['ref' => $ref, 'reports' => $reports]) {
            $package = with(clone $packages)
                ->where('ref', $ref)->first();

            foreach ($reports as ['ref' => $ref, 'name' => $name]) {
                $parsedReports[] = [
                    'ref' => $ref,
                    'name' => $name,
                    'package_id' => $package->id,
                ];
            }
        }

        return $parsedReports;
    }
}
