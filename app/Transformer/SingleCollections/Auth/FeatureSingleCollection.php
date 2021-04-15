<?php

namespace App\Transformer\SingleCollections\Auth;

use App\Foundation\Transformer\SingleCollection;

class FeatureSingleCollection extends SingleCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\SingleResources\Auth\FeatureSingleResource::class;
}
