<?php

namespace App\Http\Requests\Res\Logs\FeatureLog;

use App\Abstracts\Http\AuthorizedRequest;

class DestroyRequest extends AuthorizedRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'feature_log';

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
                'bsb_exists:\App\Database\Models\Logs\FeatureLog',
            ],
        ];
    }
}
