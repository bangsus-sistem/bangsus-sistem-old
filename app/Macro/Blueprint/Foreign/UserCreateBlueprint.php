<?php

namespace App\Macro\Blueprint\Foreign;

use App\Foundation\Macro\BlueprintContract;
use Closure;

class UserCreateBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                $this->user('user_create_id', true);
            }
        );
    }
}
