<?php

namespace App\Http\Requests\Res\Logs\AuthenticationLog;

use App\Abstracts\Http\AuthorizedRequest;

class DestroyRequest extends AuthorizedRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'authentication_log';

    /**
     * @var string
     */
    protected $actionRef = 'delete';

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'id' => [
                'required',
                'bsb_exists:\App\Database\Models\Logs\AuthenticationLog',
            ],
        ];
    }
}
