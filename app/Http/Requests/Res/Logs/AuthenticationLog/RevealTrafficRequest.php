<?php

namespace App\Http\Requests\Res\Logs\AuthenticationLog;

use App\Abstracts\Http\Requests\WidgetRequest;

class RevealTrafficRequest extends WidgetRequest
{
    /**
     * @var string
     */
    public $moduleRef = 'authentication_log';

    /**
     * @var string
     */
    public $widgetTypeRef = 'traffic';

    /**
     * @return array
     */
    public function rules()
    {
        return [];
    }
}
