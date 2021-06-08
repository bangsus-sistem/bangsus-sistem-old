<?php

namespace App\Transformer\SingleCollections\Hrm;

use App\Foundation\Transformer\SingleCollection;

class JobTitleSingleCollection extends SingleCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\SingleResources\Hrm\JobTitleSingleResource::class;
}
