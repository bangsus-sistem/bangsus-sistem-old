<?php

namespace App\Database\Models\Concerns;

use App\Database\Models\System\BranchType;

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
