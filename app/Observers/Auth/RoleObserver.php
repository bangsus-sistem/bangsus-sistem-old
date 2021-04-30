<?php

namespace App\Observers\Auth;

use App\Foundation\Observer;
use App\Models\Auth\{
    Role,
    Feature,
    Widget,
    Report,
};

class RoleObserver extends Observer
{
    /**
     * @param  \App\Models\Auth\Role  $role
     * @return void
     */
    public static function saved(Role $role)
    {
        $role->locked = false;
        $role->hidden = false;
        
        if ($role->all_features)
            $role->features()->sync(Feature::get()->pluck('id')->all());

        if ($role->all_widgets)
            $role->widgets()->sync(Widget::get()->pluck('id')->all());

        if ($role->all_reports)
            $role->reports()->sync(Report::get()->pluck('id')->all());
    }
    
    /**
     * @param  \App\Models\Auth\Role  $role
     * @return void
     */
    public static function forceDeleting()
    {
        $role->features()->detach();
        $role->widgets()->detach();
        $role->reports()->detach();
    }
}
