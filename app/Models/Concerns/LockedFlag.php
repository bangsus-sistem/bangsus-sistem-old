<?php

namespace App\Models\Concerns;

trait LockedFlag
{
    /**
     * @return void
     */
    public static function bootLockedFlag()
    {
        static::creating(fn ($model) => ! $model->locked);
        static::updating(fn ($model) => ! $model->locked);
        static::deleting(fn ($model) => ! $model->locked);
    }

    /**
     * @return boolean
     */
    public function isLocked()
    {
        return $this->locked;
    }

    /**
     * @return boolean
     */
    public function isNotLocked()
    {
        return ! $this->locked;
    }
}
