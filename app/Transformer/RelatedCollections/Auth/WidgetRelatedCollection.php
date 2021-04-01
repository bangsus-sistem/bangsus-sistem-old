<?php

namespace App\Transformers\RelatedCollections\Auth;

use App\Abstracts\Transformers\RelatedCollection;

class WidgetRelatedCollection extends RelatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformers\RelatedResources\Auth\WidgetRelatedResource::class;
}
