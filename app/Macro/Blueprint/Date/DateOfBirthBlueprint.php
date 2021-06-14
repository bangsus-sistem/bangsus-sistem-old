<?php

namespace App\Macro\Blueprint\Date;

use App\Foundation\Macro\BlueprintContract;
use Closure;

class DateOfBirthBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                return $this->date('date_of_birth');
            }
        );
    }
}
