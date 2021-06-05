<?php

namespace App\Transformer\SingleCollections\Hrm;

use App\Foundation\Transformer\SingleCollection;

class AddressTypeSingleCollection extends SingleCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\SingleResources\Hrm\AddressTypeSingleResource::class;
}
