<?php

namespace App\Transformer\SingleCollections\Auth;

use App\Foundation\Transformer\SingleCollection;

class WidgetSingleCollection extends SingleCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\SingleResources\Auth\WidgetSingleResource::class;
}
