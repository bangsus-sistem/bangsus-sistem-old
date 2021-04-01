<?php

namespace App\Macro\Blueprint\Foreign;

use App\Foundation\Macro\BlueprintContract;
use Closure;

class UserTimestampsBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                $this->userCreate();
                $this->userUpdate();
            }
        );
    }
}
