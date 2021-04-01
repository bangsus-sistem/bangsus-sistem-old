<?php

namespace App\Transformers\SingleCollections\Logs;

use App\Abstracts\Transformers\SingleCollection;

class AuthenticationLogSingleCollection extends SingleCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformers\SingleResources\Logs\AuthenticationLogSingleResource::class;
}
