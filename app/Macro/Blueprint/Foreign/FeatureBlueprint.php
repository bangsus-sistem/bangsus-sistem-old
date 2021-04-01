<?php

namespace App\Macro\Blueprint\Foreign;

use App\Foundation\Macro\BlueprintContract;
use Closure;

class FeatureBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function ($fieldName = 'feature_id', $nullable = false) {
                $table = $this->foreignId($fieldName);
                if ($nullable) $table->nullable();
                return $table->constrained('features')->onUpdate('cascade');
            }
        );
    }
}
