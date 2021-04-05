<?php

namespace App\Http\Requests\Ajax\Log\AuthenticationLog;

use App\Foundation\Http\FormRequest;

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
