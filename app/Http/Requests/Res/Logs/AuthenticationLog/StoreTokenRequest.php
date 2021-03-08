<?php

namespace App\Http\Requests\Res\Logs\AuthenticationLog;

use App\Abstracts\Http\FormRequest;

class StoreTokenRequest extends FormRequest
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
