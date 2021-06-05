<?php

namespace App\Transformer\SingleCollections\Hrm;

use App\Foundation\Transformer\SingleCollection;

class ContactTypeSingleCollection extends SingleCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\SingleResources\Hrm\ContactTypeSingleResource::class;
}
