<?php

namespace App\Database\Models\Concerns;

use App\Database\Models\System\Branch;

trait BranchPivot
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function branches()
    {
        return $this->belongsToMany(Branch::class);
    }
}
