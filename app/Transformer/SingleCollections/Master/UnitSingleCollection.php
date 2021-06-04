<?php

namespace App\Transformer\SingleCollections\Master;

use App\Foundation\Transformer\SingleCollection;

class UnitSingleCollection extends SingleCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\SingleResources\Master\UnitSingleResource::class;
}
