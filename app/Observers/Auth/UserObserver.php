<?php

namespace App\Observers\Auth;

use App\Foundation\Observer;
use App\Models\Auth\User;
use App\Models\System\Branch;

class UserObserver extends Observer
{
    /**
     * @param  \App\Models\Auth\User  $user
     * @return void
     */
    public static function saving(User $user)
    {
        $user->locked = false;
        $user->hidden = false;
    }

    /**
     * @param  \App\Models\Auth\User  $user
     * @return void
     */
    public static function saved(User $user)
    {
        if ($user->all_branches)
            $user->branches()->sync(Branch::get()->pluck('id')->all());
    }
    
    /**
     * @param  \App\Models\Auth\User  $user
     * @return void
     */
    public static function forceDeleting()
    {
        $user->branches()->detach();
    }
}
