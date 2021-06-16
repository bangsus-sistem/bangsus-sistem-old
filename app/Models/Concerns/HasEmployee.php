<?php

namespace App\Models\Concerns;

trait HasEmployee
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(\App\Models\Hrm\Employee::class);
    }
}
