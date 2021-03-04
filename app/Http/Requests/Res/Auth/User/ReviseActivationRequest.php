<?php

namespace App\Http\Requests\Res\Auth\User;

use App\Abstracts\Http\AuthorizedRequest;

class ReviseActivationRequest extends AuthorizedRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'user';

    /**
     * @var string
     */
    protected $actionRef = 'update';

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'id' => [
                'required',
                'bsb_exists:\App\Database\Models\Auth\User',
            ],
        ];
    }
}
