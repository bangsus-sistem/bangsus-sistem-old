<?php

namespace App\Transformers\RelatedCollections\Auth;

use App\Abstracts\Transformers\RelatedCollection;

class RoleFeatureRelatedCollection extends RelatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformers\RelatedResources\Auth\RoleFeatureRelatedResource::class;
}
