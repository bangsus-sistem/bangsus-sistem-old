<?php

namespace App\Macro\Blueprints\Strings;

use App\Contracts\Macro\BlueprintContract;
use Closure;

class FullNameBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                return $this->string('full_name', 400);
            }
        );
    }
}
