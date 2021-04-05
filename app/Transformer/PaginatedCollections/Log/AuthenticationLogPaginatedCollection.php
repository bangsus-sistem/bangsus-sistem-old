<?php

namespace App\Transformer\PaginatedCollections\Log;

use App\Foundation\Transformer\PaginatedCollection;

class AuthenticationLogPaginatedCollection extends PaginatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\PaginatedResources\Log\AuthenticationLogPaginatedResource::class;
}
