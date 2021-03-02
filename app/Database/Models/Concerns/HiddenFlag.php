<?php

namespace App\Database\Models\Concerns;

trait HiddenFlag
{
    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsHidden()
    {
        return $query->where('hidden', true);
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsNotHidden()
    {
        return $query->where('hidden', false);
    }
}
