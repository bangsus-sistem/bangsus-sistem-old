<?php

namespace App\Transformers\PaginatedCollections\Auth;

use App\Abstracts\Transformers\PaginatedCollection;

class WidgetTypePaginatedCollection extends PaginatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformers\PaginatedResources\Auth\WidgetTypePaginatedResource::class;
}
