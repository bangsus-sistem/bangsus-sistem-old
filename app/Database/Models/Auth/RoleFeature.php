<?php

namespace App\Database\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use App\Database\Models\Concerns\UserTimestamps;

class RoleFeature extends Model
{
    use UserTimestamps;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }
}
