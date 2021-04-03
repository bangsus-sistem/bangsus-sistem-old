<?php

namespace App\Macro\Blueprint\Foreign;

use App\Foundation\Macro\BlueprintContract;
use Closure;

class BearerTokenBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function ($fieldName = 'bearer_token_id', $nullable = false) {
                $table = $this->foreignId($fieldName);
                if ($nullable) $table->nullable();
                return $table->constrained('bearer_tokens')->onUpdate('cascade');
            }
        );
    }
}
