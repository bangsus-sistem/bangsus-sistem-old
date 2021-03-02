<?php

namespace App\Database\Models\Concerns;

trait LockedFlag
{
    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsLocked()
    {
        return $query->where('locked', true);
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsNotLocked()
    {
        return $query->where('locked', false);
    }
}
