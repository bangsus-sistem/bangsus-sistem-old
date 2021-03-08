<?php

namespace App\Http\Requests\Res\Logs\AuthenticationLog;

use App\Abstracts\Http\FormRequest;

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
