<?php

namespace App\Macro\Blueprint\Strings;

use Waffleboss\Foundation\Macro\BlueprintContract;
use Closure;

class AddressBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                return $this->string('address', 1000);
            }
        );
    }
}
