<?php

namespace App\Database\Models\Auth;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};

class Role extends Model
{
    use SoftDeletes;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function role()
    {
        return $this->hasMany(User::class);
    }
}
