<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use App\Models\Concerns\{
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function features()
    {
        return $this->belongsToMany(Feature::class, 'role_feature');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function widgets()
    {
        return $this->belongsToMany(Widget::class, 'role_widget');
    }
}
