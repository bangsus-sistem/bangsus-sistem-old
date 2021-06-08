<?php

namespace App\Http\Requests\Res\Hrm\AddressType;

use App\Foundation\Http\AuthIdRequest;
use App\Validation\Hrm\AddressType\AddressTypeIsDeletableRule;

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
        'module' => 'address_type',
        'action' => 'delete',
    ];

    /**
     * @var string
     */
    protected $model = '\App\Models\Hrm\AddressType';

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [new AddressTypeIsDeletableRule($this)];
    }
}
