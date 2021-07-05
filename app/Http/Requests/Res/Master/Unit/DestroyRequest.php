<?php

namespace App\Http\Requests\Res\Master\Unit;

use Waffleboss\Foundation\Http\AuthIdRequest;
use App\Validation\Master\Unit\UnitIsDeletableRule;

class DestroyRequest extends AuthIdRequest
{
    /**
     * @var string
     */
    protected $type = 'feature';

    /**
     * @var array
     */
    protected $refs = [
        'module' => 'unit',
        'action' => 'delete',
    ];

    /**
     * @var string
     */
    protected $model = '\App\Models\Master\Unit';

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [new UnitIsDeletableRule($this)];
    }
}
