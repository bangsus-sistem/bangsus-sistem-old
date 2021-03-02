<?php

namespace App\Database\Models\Auth;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use App\Database\Models\Concerns\{
    ActiveFlag,
    HiddenFlag,
    LockedFlag,
    UserTimestamps,
};

class Role extends Model
{
    use SoftDeletes;
    use UserTimestamps;
    use ActiveFlag, HiddenFlag, LockedFlag;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
