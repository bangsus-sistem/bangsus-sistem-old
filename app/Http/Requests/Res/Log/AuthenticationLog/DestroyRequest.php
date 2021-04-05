<?php

namespace App\Http\Requests\Res\Log\AuthenticationLog;

use App\Foundation\Http\AuthRequest;

class DestroyRequest extends AuthRequest
{
    /**
     * @var string
     */
    protected $type = 'feature';

    /**
     * @var array
     */
    protected $refs = [
        'module_ref' => 'authentication_log',
        'action_ref' => 'index',
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'id' => [
                'required',
                'bsb_exists:\App\Models\Log\AuthenticationLog',
            ],
        ];
    }
}
