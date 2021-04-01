<?php

namespace App\Transformers\SingleCollections\Auth;

use App\Abstracts\Transformers\SingleCollection;

class PackageSingleCollection extends SingleCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformers\SingleResources\Auth\PackageSingleResource::class;
}
