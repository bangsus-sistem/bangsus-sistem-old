<?php

namespace App\Macro\Blueprint\Foreign;

use App\Foundation\Macro\BlueprintContract;
use Closure;

class ReportBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function ($fieldName = 'report_id', $nullable = false) {
                $table = $this->foreignId($fieldName);
                if ($nullable) $table->nullable();
                return $table->constrained('reports')->onUpdate('cascade');
            }
        );
    }
}
