<?php

namespace App\Transformers\PaginatedCollections\Auth;

use App\Abstracts\Transformers\PaginatedCollection;

class UserPaginatedCollection extends PaginatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformers\PaginatedResources\Auth\UserPaginatedResource::class;
}
