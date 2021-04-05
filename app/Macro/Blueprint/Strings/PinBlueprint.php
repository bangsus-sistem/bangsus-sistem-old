<?php

namespace App\Macro\Blueprint\Strings;

use App\Foundation\Macro\BlueprintContract;
use Closure;

class PinBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                return $this->string('pin', 6);
            }
        );
    }
}
