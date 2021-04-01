<?php

namespace App\Macro\Blueprints\Strings;

use App\Contracts\Macro\BlueprintContract;
use Closure;

class RefBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                return $this->string('ref', 100)->unique();
            }
        );
    }
}
