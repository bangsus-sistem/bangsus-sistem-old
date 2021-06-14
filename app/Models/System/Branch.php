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
use Illuminate\Support\Facades\Auth;

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

    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUserAuthorized($query)
    {
        return $query->whereIn('id', Auth::user()->branches->pluck('id')->all());
    }
}
