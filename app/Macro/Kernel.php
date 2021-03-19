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

            // Boolean macro.
            'access' => Database\Blueprints\Booleans\AccessBlueprint::class,
            'active' => Database\Blueprints\Booleans\ActiveBlueprint::class,
            'allAccess' => Database\Blueprints\Booleans\AllAccessBlueprint::class,
            'allBranchAccess' => Database\Blueprints\Booleans\AllBranchAccessBlueprint::class,
            'allBranchTypeAccess' => Database\Blueprints\Booleans\AllBranchTypeAccessBlueprint::class,
            'allWidget' => Database\Blueprints\Booleans\AllWidgetBlueprint::class,
            'locked' => Database\Blueprints\Booleans\LockedBlueprint::class,
            'state' => Database\Blueprints\Booleans\StateBlueprint::class,
            
            // Foreign macro.
            'action' => Database\Blueprints\Foreigns\ActionBlueprint::class,
            'branch' => Database\Blueprints\Foreigns\BranchBlueprint::class,
            'branchType' => Database\Blueprints\Foreigns\BranchTypeBlueprint::class,
            'feature' => Database\Blueprints\Foreigns\FeatureBlueprint::class,
            'module' => Database\Blueprints\Foreigns\ModuleBlueprint::class,
            'package' => Database\Blueprints\Foreigns\PackageBlueprint::class,
            'role' => Database\Blueprints\Foreigns\RoleBlueprint::class,
            'user' => Database\Blueprints\Foreigns\UserBlueprint::class,
            'userCreate' => Database\Blueprints\Foreigns\UserCreateBlueprint::class,
            'userDelete' => Database\Blueprints\Foreigns\UserDeleteBlueprint::class,
            'userTimestamps' => Database\Blueprints\Foreigns\UserTimestampsBlueprint::class,
            'userUpdate' => Database\Blueprints\Foreigns\UserUpdateBlueprint::class,
            'widget' => Database\Blueprints\Foreigns\WidgetBlueprint::class,
            'widgetType' => Database\Blueprints\Foreigns\WidgetTypeBlueprint::class,

            // String macro.
            'code' => Database\Blueprints\Strings\CodeBlueprint::class,
            'fullName' => Database\Blueprints\Strings\FullNameBlueprint::class,
            'name' => Database\Blueprints\Strings\NameBlueprint::class,
            'note' => Database\Blueprints\Strings\NoteBlueprint::class,
            'password' => Database\Blueprints\Strings\PasswordBlueprint::class,
            'ref' => Database\Blueprints\Strings\RefBlueprint::class,
            'username' => Database\Blueprints\Strings\UsernameBlueprint::class,
            'token' => Database\Blueprints\Strings\TokenBlueprint::class,

            // Timestamps macro.
            'expiredAt' => Database\Blueprints\Timestamps\ExpiredAtBlueprint::class,
            'usedAt' => Database\Blueprints\Timestamps\UsedAtBlueprint::class,
        ]
    ];

    /**
     * @var array
     */
    public static $validation = [

        // Rule macro.
        'rules' => [

            // Database rule.
            'exists' => Validation\Rules\Database\ExistsRule::class,
        ],
    ];
}
