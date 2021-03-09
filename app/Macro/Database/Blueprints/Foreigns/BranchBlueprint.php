<?php

namespace App\Macro\Database\Blueprints\Foreigns;

use App\Contracts\Macro\Database\BlueprintContract;
use Closure;

class BranchBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function ($fieldName = 'branch_id', $nullable = false) {
                $table = $this->foreignId($fieldName);
                if ($nullable) $table->nullable();
                return $table->constrained('branches')->onUpdate('cascade');
            }
        );
    }
}
