<?php

namespace App\Transformers\RelatedCollections\Auth;

use App\Abstracts\Transformers\RelatedCollection;

class MoculeRelatedCollection extends RelatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformers\RelatedResources\Auth\MoculeRelatedResource::class;
}
