<?php

namespace App\Macro\Blueprints\Strings;

use App\Contracts\Macro\BlueprintContract;
use Closure;

class NoteBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                return $this->string('note', 1000);
            }
        );
    }
}
