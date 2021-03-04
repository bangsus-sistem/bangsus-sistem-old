<?php

namespace App\Database\Models\Concerns;

trait BranchTypePivot
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function branchTypes()
    {
        return $this->belongsToMany(BranchType::class);
    }
}
