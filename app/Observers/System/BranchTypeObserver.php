<?php

namespace App\Observers\System;

use App\Foundation\Observer;
use App\Models\System\BranchType;

class BranchTypeObserver extends Observer
{
    /**
     * @param  \App\Models\System\BranchType  $branchType
     * @return void
     */
    public static function saving(BranchType $branchType)
    {
        $branchType->locked = false;
        $branchType->hidden = false;
    }
}
