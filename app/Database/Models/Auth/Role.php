<?php

namespace App\Database\Models\Auth;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use App\Database\Models\Concerns\{
    ActiveFlag,
    LockedFlag,
    UserDelete,
    UserTimestamps,
};

class Role extends Model
{
    use SoftDeletes;
    use UserTimestamps, UserDelete;
    use ActiveFlag, LockedFlag;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
