<?php

namespace App\Transformer\SingleCollections\Log;

use App\Foundation\Transformer\SingleCollection;

class AuthenticationLogSingleCollection extends SingleCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\SingleResources\Log\AuthenticationLogSingleResource::class;
}
