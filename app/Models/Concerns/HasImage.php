<?php

namespace App\Models\Concerns;

trait HasImage
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function image()
    {
        return $this->belongsTo(\App\Models\Storage\Image::class);
    }
}
