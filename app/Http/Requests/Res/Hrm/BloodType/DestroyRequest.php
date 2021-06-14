<?php

namespace App\Http\Requests\Res\Hrm\BloodType;

use App\Foundation\Http\AuthIdRequest;
use App\Validation\Hrm\BloodType\BloodTypeIsDeletableRule;

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
        'module' => 'blood_type',
        'action' => 'delete',
    ];

    /**
     * @var string
     */
    protected $model = '\App\Models\Hrm\BloodType';

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [new BloodTypeIsDeletableRule($this)];
    }
}
