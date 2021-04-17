<?php

namespace App\Transformer\SingleCollections\Auth;

use App\Foundation\Transformer\SingleCollection;

class ReportSingleCollection extends SingleCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\SingleResources\Auth\ReportSingleResource::class;
}
