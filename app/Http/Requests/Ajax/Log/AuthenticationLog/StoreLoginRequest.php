<?php

namespace Waffleboss\Library\Http\Requests\Ajax\Log\AuthenticationLog;

use Waffleboss\Foundation\Http\FormRequest;

class StoreLoginRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'username' => [
                'required',
            ],
            'password' => [
                'required',
            ],
        ];
    }
}
