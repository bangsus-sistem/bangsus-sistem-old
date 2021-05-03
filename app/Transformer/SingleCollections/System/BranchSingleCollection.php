<?php

namespace App\Transformer\SingleCollections\System;

use App\Foundation\Transformer\SingleCollection;

class BranchSingleCollection extends SingleCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\SingleResources\System\BranchSingleResource::class;
}
