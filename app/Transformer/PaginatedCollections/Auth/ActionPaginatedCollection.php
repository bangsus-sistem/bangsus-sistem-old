<?php

namespace App\Transformer\PaginatedCollections\Auth;

use App\Foundation\Transformer\PaginatedCollection;

class ActionPaginatedCollection extends PaginatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\PaginatedResources\Auth\ActionPaginatedResource::class;
}
