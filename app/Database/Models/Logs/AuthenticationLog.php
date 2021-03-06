<?php

namespace App\Database\Models\Logs;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use App\Database\Models\Concerns\UserDelete;
use App\Database\Models\Auth\User;

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
