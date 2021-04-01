<?php

namespace App\Macro\Blueprint\Strings;

use App\Foundation\Macro\BlueprintContract;
use Closure;

class CodeBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                return $this->string('code', 50)->unique();
            }
        );
    }
}
