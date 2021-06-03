<?php

namespace App\Observers;

class Kernel
{
    /**
     * @var array
     */
    public static $observers = [
        \App\Models\Auth\Role::class => Auth\RoleObserver::class,
        \App\Models\Auth\User::class => Auth\UserObserver::class,
        \App\Models\System\Branch::class => System\BranchObserver::class,
        \App\Models\System\BranchType::class => System\BranchTypeObserver::class,
    ];
}
