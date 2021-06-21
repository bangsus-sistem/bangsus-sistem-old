<?php

namespace Waffleboss\Library\Http\Requests\Ajax\Log\AuthenticationLog;

use Waffleboss\Foundation\Http\FormRequest;

class StoreAuthenticationTokenRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'token' => [
                'required',
                'min:12',
            ],
        ];
    }
}
