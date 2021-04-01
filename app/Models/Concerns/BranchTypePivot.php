<?php

namespace App\Models\Concerns;

use App\Models\System\BranchType;

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
