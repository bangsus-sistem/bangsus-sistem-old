<?php

namespace App\Http\Requests\Res\Hrm\ContactType;

use App\Foundation\Http\AuthIdRequest;
use App\Validation\Hrm\ContactType\ContactTypeIsDeletableRule;

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
        'module' => 'contact_type',
        'action' => 'delete',
    ];

    /**
     * @var string
     */
    protected $model = '\App\Models\Hrm\ContactType';

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [new ContactTypeIsDeletableRule($this)];
    }
}
