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
            'action' => Database\Blueprints\Foregins\ActionBlueprint::class,
            'module' => Database\Blueprints\Foregins\ModuleBlueprint::class,
            'package' => Database\Blueprints\Foregins\PackageBlueprint::class,

            // String macro.
            'name' => Database\Blueprints\Strings\NameBlueprint::class,
            'ref' => Database\Blueprints\Strings\RefBlueprint::class,
        ]
    ];
}
