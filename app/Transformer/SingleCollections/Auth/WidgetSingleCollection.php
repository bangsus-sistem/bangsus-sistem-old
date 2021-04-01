<?php

namespace App\Transformers\SingleCollections\Auth;

use App\Abstracts\Transformers\SingleCollection;

class WidgetSingleCollection extends SingleCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformers\SingleResources\Auth\WidgetSingleResource::class;
}
