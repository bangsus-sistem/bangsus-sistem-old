<?php

namespace App\Models\Concerns;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

trait HasUserAdmit
{
    /**
     * @return void
     */
    public static function bootHasUserAdmit()
    {
        static::admitting(function ($model) {
            $user = Auth::user();
            if ( ! is_null($user)) $model->user_admit_id = $user->id;
            $model->saveQuietly();
        });

        static::unadmitting(function ($model) {
            $user = Auth::user();
            $model->user_admit_id = null;
            $model->save();
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userAdmit()
    {
        return $this->belongsTo(\App\Models\Auth\User::class);
    }
}
