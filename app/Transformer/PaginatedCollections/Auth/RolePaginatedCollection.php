<?php

namespace App\Transformer\PaginatedCollections\Auth;

use App\Foundation\Transformer\PaginatedCollection;

class RolePaginatedCollection extends PaginatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\PaginatedResources\Auth\RolePaginatedResource::class;
}
