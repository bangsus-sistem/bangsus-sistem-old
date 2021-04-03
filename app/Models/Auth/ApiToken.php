<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use App\Models\Concerns\{
    HasUser,
    HasUserDelete,
    ExpiredTimestamp,
};

class ApiToken extends Model
{
    use SoftDeletes, HasUser, HasUserDelete, ExpiredTimestamp;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bearerToken()
    {
        return $this->belongsTo(ApiToken::class);
    }
}
