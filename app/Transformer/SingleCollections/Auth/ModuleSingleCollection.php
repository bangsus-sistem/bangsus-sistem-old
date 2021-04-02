<?php

namespace App\Transformer\SingleCollections\Auth;

use App\Foundation\Transformer\SingleCollection;

class ModuleSingleCollection extends SingleCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\SingleResources\Auth\ModuleSingleResource::class;
}
