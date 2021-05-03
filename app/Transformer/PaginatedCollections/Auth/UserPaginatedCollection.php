<?php

namespace App\Transformer\PaginatedCollections\Auth;

use App\Foundation\Transformer\PaginatedCollection;

class UserPaginatedCollection extends PaginatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\PaginatedResources\Auth\UserPaginatedResource::class;
}
