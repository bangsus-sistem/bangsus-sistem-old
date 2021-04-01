<?php

namespace App\Http\Requests\Res\Logs\AuthenticationLog;

use App\Abstracts\Http\Requests\WidgetRequest;

class RevealLatestDataRequest extends WidgetRequest
{
    /**
     * @var string
     */
    public $moduleRef = 'authentication_log';

    /**
     * @var string
     */
    public $widgetTypeRef = 'latest_data';

    /**
     * @return array
     */
    public function rules()
    {
        return [];
    }
}
