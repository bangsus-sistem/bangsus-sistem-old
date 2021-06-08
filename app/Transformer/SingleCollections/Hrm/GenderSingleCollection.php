<?php

namespace App\Transformer\SingleCollections\Hrm;

use App\Foundation\Transformer\SingleCollection;

class GenderSingleCollection extends SingleCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\SingleResources\Hrm\GenderSingleResource::class;
}
