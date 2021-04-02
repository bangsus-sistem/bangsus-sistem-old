<?php

namespace App\Transformer\SingleCollections\Auth;

use App\Foundation\Transformer\SingleCollection;

class PackageSingleCollection extends SingleCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\SingleResources\Auth\PackageSingleResource::class;
}
