<?php

namespace App\Http\Requests\Res\Auth\Role;

use App\Abstracts\Http\Requests\FeatureRequest;

class ReviseActivationRequest extends FeatureRequest
{
    /**
     * @var string
     */
    public $moduleRef = 'role';

    /**
     * @var string
     */
    public $actionRef = 'update';

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'id' => [
                'required',
                'bsb_exists:\App\Database\Models\Auth\Role',
            ],
        ];
    }
}
