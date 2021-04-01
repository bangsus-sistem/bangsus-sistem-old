<?php

namespace App\Macro\Blueprint\Booleans;

use App\Foundation\Macro\BlueprintContract;
use Closure;

class AllWidgetBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                return $this->boolean('all_widget');
            }
        );
    }
}
