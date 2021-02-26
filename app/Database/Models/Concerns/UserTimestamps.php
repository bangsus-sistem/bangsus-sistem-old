<?php

namespace App\Database\Models\Concerns;

use Illuminate\Support\Facades\Auth;
use App\Database\Models\Auth\User;

trait UserTimestamps
{
    /**
     * @return void
     */
    public static function bootUserTimestamps()
    {
        static::creating(function ($model) {
            $model->user_create_id = Auth::user()->id;
        });
        static::updating(function ($model) {
            $model->user_update_id = Auth::user()->id;
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userCreate()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userUpdate()
    {
        return $this->belongsTo(User::class);
    }
}
