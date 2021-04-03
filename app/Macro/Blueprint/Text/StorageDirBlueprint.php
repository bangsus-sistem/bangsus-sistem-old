<?php

namespace App\Macro\Blueprint\Text;

use App\Foundation\Macro\BlueprintContract;
use Closure;

class StorageDirBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                return $this->text('storage_dir');
            }
        );
    }
}
