<?php

namespace App\Transformers\SingleCollections\Auth;

use App\Abstracts\Transformers\SingleCollection;

class WidgetTypeSingleCollection extends SingleCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformers\SingleResources\Auth\WidgetTypeSingleResource::class;
}
