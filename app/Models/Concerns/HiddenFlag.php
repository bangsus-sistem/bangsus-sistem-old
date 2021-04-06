<?php

namespace App\Models\Concerns;

use App\Scopes\HiddenFlagScope;

trait HiddenFlag
{
    /**
     * @return void
     */
    public static function bootHiddenFlag()
    {
        // static::addGlobalScope(new HiddenFlagScope);
    }

    /**
     * @return boolean
     */
    public function isHidden()
    {
        return $this->hidden;
    }

    /**
     * @return boolean
     */
    public function isNotHidden()
    {
        return ! $this->hidden;
    }
}
