<?php

namespace App\Database\Models\Concerns;

trait ActiveFlag
{
    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsActive()
    {
        return $query->where('active', true);
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsNotActive()
    {
        return $query->where('active', false);
    }
}
