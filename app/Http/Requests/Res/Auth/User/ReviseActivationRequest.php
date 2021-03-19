<?php

namespace App\Http\Requests\Res\Auth\User;

use App\Abstracts\Http\Requests\FeatureRequest;

class ReviseActivationRequest extends FeatureRequest
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
