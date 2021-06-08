<?php

namespace App\Http\Requests\Res\Hrm\Gender;

use App\Foundation\Http\AuthIdRequest;
use App\Validation\Hrm\Gender\GenderIsDeletableRule;

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
        'module' => 'gender',
        'action' => 'delete',
    ];

    /**
     * @var string
     */
    protected $model = '\App\Models\Hrm\Gender';

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [new GenderIsDeletableRule($this)];
    }
}
