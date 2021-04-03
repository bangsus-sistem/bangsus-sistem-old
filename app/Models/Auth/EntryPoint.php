<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use App\Models\Concerns\{
    HasUserTimestamps,
    HasUserDelete,
};

class EntryPoint extends Model
{
    use SoftDeletes, HasUserTimestamps, HasUserDelete;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bearerTokens()
    {
        return $this->hasMany(BearerToken::class);
    }
}
