<?php

namespace App\Models\Concerns;

trait LockedFlag
{
    /**
     * @return void
     */
    public static function bootLockedFlag()
    {
        static::creating(fn ($model) => false);
        static::updating(fn ($model) => false);
        static::deleting(fn ($model) => false);
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
