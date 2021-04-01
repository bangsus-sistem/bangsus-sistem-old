<?php

namespace App\Macro;

class Kernel
{
    /**
     * @var array
     */
    public static $blueprints = [
        // Boolean macro.
        'access' => Blueprint\Boolean\AccessBlueprint::class,
        'active' => Blueprint\Boolean\ActiveBlueprint::class,
        'allAccess' => Blueprint\Boolean\AllAccessBlueprint::class,
        'allBranchAccess' => Blueprint\Boolean\AllBranchAccessBlueprint::class,
        'allBranchTypeAccess' => Blueprint\Boolean\AllBranchTypeAccessBlueprint::class,
        'allWidget' => Blueprint\Boolean\AllWidgetBlueprint::class,
        'locked' => Blueprint\Boolean\LockedBlueprint::class,
        'state' => Blueprint\Boolean\StateBlueprint::class,
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
