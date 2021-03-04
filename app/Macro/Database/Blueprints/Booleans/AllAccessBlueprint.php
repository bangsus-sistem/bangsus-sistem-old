<?php

namespace App\Macro\Database\Blueprints\Booleans;

use App\Contracts\Macro\Database\BlueprintContract;
use Closure;

class AllAccessBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                return $this->boolean('all_access');
            }
        );
    }
}
