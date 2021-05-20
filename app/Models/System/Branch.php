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
use App\Models\Auth\UserBranch;

class Branch extends Model
{
    use SoftDeletes;
    use HasUserTimestamps;
    use ActiveFlag;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branchType()
    {
        return $this->belongsTo(BranchType::class);
    }
}
