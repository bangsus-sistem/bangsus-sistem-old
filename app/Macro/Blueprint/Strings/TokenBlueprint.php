<?php

namespace App\Macro\Blueprint\Strings;

use App\Foundation\Macro\BlueprintContract;
use Closure;

class TokenBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function (int $length = 60) {
                return $this->string('token', $length)->unique();
            }
        );
    }
}
