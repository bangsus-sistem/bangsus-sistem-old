<?php

namespace App\Models\Concerns;

trait HasUser
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\Auth\User::class);
    }
}
