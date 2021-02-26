<?php

namespace App\Transformers\SingleCollections\Auth;

use App\Abstracts\Transformers\SingleCollection;

class FeatureSingleCollection extends SingleCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformers\SingleResources\Auth\FeatureSingleResource::class;
}
