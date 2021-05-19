<?php

namespace App\Http\Requests\Res\Auth\User;

use App\Foundation\Http\AuthRequest;

class ReviseActivationRequest extends AuthRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'id' => [
                'required',
                'bsb_exists:\App\Models\Auth\User',
            ],
        ];
    }
}
