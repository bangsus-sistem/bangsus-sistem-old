<?php

namespace App\Macro;

class Kernel
{
    /**
     * @var array
     */
    public static $database = [

        // Blueprint macro.
        'blueprints' => [
            
            // Foreign macro.
            'action' => Database\Blueprints\Foreigns\ActionBlueprint::class,
            'module' => Database\Blueprints\Foreigns\ModuleBlueprint::class,
            'package' => Database\Blueprints\Foreigns\PackageBlueprint::class,

            // String macro.
            'name' => Database\Blueprints\Strings\NameBlueprint::class,
            'ref' => Database\Blueprints\Strings\RefBlueprint::class,
        ]
    ];
}
