<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use App\Models\Concerns\{
    ActiveFlag,
    HasUserTimestamps,
};
use App\Models\Auth\UserBranchType;

class BranchType extends Model
{
    use SoftDeletes;
    use HasUserTimestamps;
    use ActiveFlag;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
}
