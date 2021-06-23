<?php

namespace App\Macro\Blueprint\Strings;

use Waffleboss\Foundation\Macro\BlueprintContract;
use Closure;

class ContactBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                return $this->string('contact', 1000);
            }
        );
    }
}
