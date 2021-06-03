<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use App\Models\Concerns\{
    HasUserTimestamps,
    HasUserDelete,
    ActiveFlag,
    HiddenFlag,
    LockedFlag,
};
use App\Models\Auth\User;

class Branch extends Model
{
    use SoftDeletes, HasUserTimestamps, HasUserDelete, ActiveFlag, HiddenFlag,
        LockedFlag;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branchType()
    {
        return $this->belongsTo(BranchType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
