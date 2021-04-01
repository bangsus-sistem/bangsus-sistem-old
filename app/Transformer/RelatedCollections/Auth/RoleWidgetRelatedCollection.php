<?php

namespace App\Transformers\RelatedCollections\Auth;

use App\Abstracts\Transformers\RelatedCollection;

class RoleWidgetRelatedCollection extends RelatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformers\RelatedResources\Auth\RoleWidgetRelatedResource::class;
}
