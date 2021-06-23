<?php

namespace App\Macro\Blueprint\Strings;

use Waffleboss\Foundation\Macro\BlueprintContract;
use Closure;

class PlaceOfBirthBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                return $this->string('place_of_birth', 200);
            }
        );
    }
}
