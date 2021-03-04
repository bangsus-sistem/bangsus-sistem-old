<?php

namespace App\Database\Models\Concerns;

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
