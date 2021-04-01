<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use App\Models\Concerns\UserDelete;
use App\Models\Auth\User;

class AuthenticationLog extends Model
{
    use SoftDeletes;
    use UserDelete;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
