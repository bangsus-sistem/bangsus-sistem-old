<?php

namespace App\Http\Requests\Res\Auth\User;

use App\Abstracts\Http\Requests\FeatureRequest;

class RevisePasswordRequest extends FeatureRequest
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
