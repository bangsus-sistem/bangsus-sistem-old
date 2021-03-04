<?php

namespace App\Database\Models\System;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use App\Database\Models\Concerns\{
    ActiveFlag,
    UserTimestamps,
};
use App\Database\Models\Auth\UserBranchType;

class BranchType extends Model
{
    use SoftDeletes;
    use UserTimestamps;
    use ActiveFlag;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
}
