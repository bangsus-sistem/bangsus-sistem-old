<?php

namespace App\Transformers\PaginatedCollections\Auth;

use App\Abstracts\Transformers\PaginatedCollection;

class ActionPaginatedCollection extends PaginatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformers\PaginatedResources\Auth\ActionPaginatedResource::class;
}
