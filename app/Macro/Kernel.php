<?php

namespace App\Macro;

class Kernel
{
    /**
     * @var array
     */
    public static $blueprints = [
        // Boolean macro.
        'access' => Blueprint\Booleans\AccessBlueprint::class,
        'active' => Blueprint\Booleans\ActiveBlueprint::class,
        'allFeatures' => Blueprint\Booleans\AllFeaturesBlueprint::class,
        'allBranchAccess' => Blueprint\Booleans\AllBranchAccessBlueprint::class,
        'allBranchTypeAccess' => Blueprint\Booleans\AllBranchTypeAccessBlueprint::class,
        'allFeatures' => Blueprint\Booleans\AllFeaturesBlueprint::class,
        'allWidgets' => Blueprint\Booleans\AllWidgetsBlueprint::class,
        'locked' => Blueprint\Booleans\LockedBlueprint::class,
        'state' => Blueprint\Booleans\StateBlueprint::class,
        // Foreign macro.
        'action' => Blueprint\Foreign\ActionBlueprint::class,
        'branch' => Blueprint\Foreign\BranchBlueprint::class,
        'branchType' => Blueprint\Foreign\BranchTypeBlueprint::class,
        'feature' => Blueprint\Foreign\FeatureBlueprint::class,
        'module' => Blueprint\Foreign\ModuleBlueprint::class,
        'package' => Blueprint\Foreign\PackageBlueprint::class,
        'role' => Blueprint\Foreign\RoleBlueprint::class,
        'user' => Blueprint\Foreign\UserBlueprint::class,
        'userCreate' => Blueprint\Foreign\UserCreateBlueprint::class,
        'userDelete' => Blueprint\Foreign\UserDeleteBlueprint::class,
        'userTimestamps' => Blueprint\Foreign\UserTimestampsBlueprint::class,
        'userUpdate' => Blueprint\Foreign\UserUpdateBlueprint::class,
        'widget' => Blueprint\Foreign\WidgetBlueprint::class,
        'widgetType' => Blueprint\Foreign\WidgetTypeBlueprint::class,
        // String macro.
        'code' => Blueprint\Strings\CodeBlueprint::class,
        'fullName' => Blueprint\Strings\FullNameBlueprint::class,
        'name' => Blueprint\Strings\NameBlueprint::class,
        'note' => Blueprint\Strings\NoteBlueprint::class,
        'password' => Blueprint\Strings\PasswordBlueprint::class,
        'ref' => Blueprint\Strings\RefBlueprint::class,
        'username' => Blueprint\Strings\UsernameBlueprint::class,
        'token' => Blueprint\Strings\TokenBlueprint::class,
        // Timestamps macro.
        'expiredAt' => Blueprint\Timestamp\ExpiredAtBlueprint::class,
        'usedAt' => Blueprint\Timestamp\UsedAtBlueprint::class,
    ];

    /**
     * @var array
     */
    public static $rules = [
        // Database rule.
        'exists' => Rule\Database\ExistsRule::class,
    ];
}
