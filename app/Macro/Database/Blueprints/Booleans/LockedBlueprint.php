<?php

namespace App\Macro\Database\Blueprints\Booleans;

use App\Contracts\Macro\Database\BlueprintContract;
use Closure;

class LockedBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                return $this->boolean('locked');
            }
        );
    }
}
