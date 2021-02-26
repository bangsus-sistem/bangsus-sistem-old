<?php

namespace App\Transformers\RelatedCollections\Auth;

use App\Abstracts\Transformers\RelatedCollection;

class PackageRelatedCollection extends RelatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformers\RelatedResources\Auth\PackageRelatedResource::class;
}
