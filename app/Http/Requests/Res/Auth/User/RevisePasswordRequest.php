<?php

namespace App\Http\Requests\Res\Auth\User;

use App\Foundation\Http\AuthIdRequest;

class RevisePasswordRequest extends AuthIdRequest
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
        'action' => 'update',
    ];

    /**
     * @var string
     */
    protected $model = '\App\Models\Auth\User';

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'password' => [
                'required',
                'min:6',
            ],
            'password_confirmation' => [
                'required_with:password',
                'same:password',
            ],
        ];
    }
}
