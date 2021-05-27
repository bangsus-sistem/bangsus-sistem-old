<?php

namespace App\Http\Requests\Res\Auth\User;

use App\Foundation\Http\AuthIdRequest;
use App\Validation\Auth\User\UserIsDeletableRule;

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
        'module' => 'user',
        'action' => 'delete',
    ];

    /**
     * @var string
     */
    protected $model = '\App\Models\Auth\User';

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [new UserIsDeletableRule($this)];
    }
}
