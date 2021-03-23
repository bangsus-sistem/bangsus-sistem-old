<?php

namespace App\Http\Requests\Res\Logs\FeatureLog;

use App\Abstracts\Http\Requests\FeatureRequest;

class DestroyRequest extends FeatureRequest
{
    /**
     * @var string
     */
    public $moduleRef = 'feature_log';

    /**
     * @var string
     */
    public $actionRef = 'delete';

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
