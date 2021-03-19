<?php

namespace App\Auth;

use App\Database\Models\Auth\Widget;
use App\Exceptions\RequestAuthorizationException;

class RequestedWidgetParser extends Parser
{
    /**
     * @var string
     */
    protected $moduleRef;

    /**
     * @var string
     */
    protected $widgetTypeRef;

    /**
     * @param  string  $moduleRef
     * @param  string  $widgetTypeRef
     */
    public function __construct($moduleRef, $widgetTypeRef)
    {
        $this->moduleRef = $moduleRef;
        $this->widgetTypeRef = $widgetTypeRef;
    }

    /**
     * @return \App\Database\Models\Auth\Widget
     */
    public function get()
    {
        $widget = Widget::whereHas(
            'module',
            fn ($query) => $query->where('ref', $this->moduleRef)
        )
            ->whereHas(
                'widgetType',
                fn ($query) => $query->where('ref', $this->widgetTypeRef)
            )
            ->first();

        if (is_null($widget))
            throw new RequestAuthorizationException(
                'The requested widget not found'
            );

        return $widget;
    }
}
