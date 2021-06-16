<?php

namespace App\Transformer\SingleCollections\Storage;

use App\Foundation\Transformer\SingleCollection;

class ImageSingleCollection extends SingleCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\SingleResources\Storage\ImageSingleResource::class;
}
