<?php

namespace App\Transformers\SingleCollections\Logs;

use App\Abstracts\Transformers\SingleCollection;

class FeatureLogSingleCollection extends SingleCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformers\SingleResources\Logs\FeatureLogSingleResource::class;
}
