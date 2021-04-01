<?php

namespace App\Transformers\PaginatedCollections\Auth;

use App\Abstracts\Transformers\PaginatedCollection;

class RolePaginatedCollection extends PaginatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformers\PaginatedResources\Auth\RolePaginatedResource::class;
}
