<?php

namespace App\Macro\Database\Blueprints\Strings;

use App\Contracts\Macro\Database\BlueprintContract;
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
