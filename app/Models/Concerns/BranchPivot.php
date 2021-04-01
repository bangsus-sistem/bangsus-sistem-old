<?php

namespace App\Models\Concerns;

use App\Models\System\Branch;

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
