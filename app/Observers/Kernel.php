<?php

namespace App\Observers;

class Kernel
{
    /**
     * @var array
     */
    public static $observers = [
        \App\Models\Auth\Role::class => Auth\RoleObserver::class,
    ];
}
