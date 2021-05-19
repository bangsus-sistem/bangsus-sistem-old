<?php

namespace App\Transformer\SingleCollections\System;

use App\Foundation\Transformer\SingleCollection;

class BranchTypeSingleCollection extends SingleCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\SingleResources\System\BranchTypeSingleResource::class;
}
