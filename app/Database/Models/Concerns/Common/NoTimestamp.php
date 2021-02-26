<?php

namespace App\Database\Models\Concerns\Common;

trait NoTimestamp
{
    /**
     * @var bool
     */
    public $timestamps = false;
}
