<?php

namespace App\Macro\Blueprint\Booleans;

use App\Foundation\Macro\BlueprintContract;
use Closure;

class StateBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                return $this->boolean('state');
            }
        );
    }
}
