<?php

namespace App\Transformer\SingleCollections\Storage;

use App\Foundation\Transformer\SingleCollection;

class FileSingleCollection extends SingleCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\SingleResources\Storage\FileSingleResource::class;
}
