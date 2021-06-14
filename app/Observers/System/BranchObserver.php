<?php

namespace App\Observers\System;

use App\Foundation\Observer;
use App\Models\System\{
    Branch,
    BranchType,
};
use App\Models\Auth\User;

class BranchObserver extends Observer
{
    /**
     * @param  \App\Models\System\Branch  $branch
     * @return void
     */
    public static function creating(Branch $branch)
    {
        
    }

    /**
     * @param  \App\Models\System\Branch  $branch
     * @return void
     */
    public static function saving(Branch $branch)
    {
        $branch->locked = false;
        $branch->hidden = false;
    }

    /**
     * @param  \App\Models\System\Branch  $branch
     * @return void
     */
    public static function saved(Branch $branch)
    {
        $branch->users()
            ->sync(
                User::where('all_branches', true)->get()->pluck('id')->all()
            );
    }
    
    /**
     * @param  \App\Models\System\Branch  $branch
     * @return void
     */
    public static function forceDeleting()
    {
        $branch->users()->detach();
    }
}
