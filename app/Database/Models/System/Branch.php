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
use App\Database\Models\Auth\UserBranch;

class Branch extends Model
{
    use SoftDeletes;
    use UserTimestamps;
    use ActiveFlag;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branchType()
    {
        return $this->hasMany(BranchType::class);
    }
}
