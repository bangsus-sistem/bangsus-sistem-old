<?php

namespace App\Http\Requests\Res\Hrm\Division;

use App\Foundation\Http\AuthIdRequest;
use App\Validation\Hrm\Division\DivisionIsDeletableRule;

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
        'module' => 'division',
        'action' => 'delete',
    ];

    /**
     * @var string
     */
    protected $model = '\App\Models\Hrm\Division';

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [new DivisionIsDeletableRule($this)];
    }
}
