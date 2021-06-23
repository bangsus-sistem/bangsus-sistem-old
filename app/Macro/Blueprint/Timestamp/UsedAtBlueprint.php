<?php

namespace App\Macro\Blueprint\Timestamp;

use Waffleboss\Foundation\Macro\BlueprintContract;
use Closure;

class UsedAtBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                return $this->timestamp('used_at')->nullable();
            }
        );
    }
}
