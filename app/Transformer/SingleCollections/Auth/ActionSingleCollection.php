<?php

namespace App\Transformers\SingleCollections\Auth;

use App\Abstracts\Transformers\SingleCollection;

class ActionSingleCollection extends SingleCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformers\SingleResources\Auth\ActionSingleResource::class;
}
