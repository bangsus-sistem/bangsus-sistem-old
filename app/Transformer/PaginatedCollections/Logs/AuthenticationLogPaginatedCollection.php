<?php

namespace App\Transformers\PaginatedCollections\Logs;

use App\Abstracts\Transformers\PaginatedCollection;

class AuthenticationLogPaginatedCollection extends PaginatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformers\PaginatedResources\Logs\AuthenticationLogPaginatedResource::class;
}
