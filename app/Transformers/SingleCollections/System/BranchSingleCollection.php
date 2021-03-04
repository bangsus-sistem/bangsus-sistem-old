<?php

namespace App\Transformers\SingleCollections\System;

use App\Abstracts\Transformers\SingleCollection;

class BranchSingleCollection extends SingleCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformers\SingleResources\System\BranchSingleResource::class;
}
