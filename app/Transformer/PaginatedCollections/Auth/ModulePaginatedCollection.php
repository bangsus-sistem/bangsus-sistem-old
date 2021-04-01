<?php

namespace App\Transformers\PaginatedCollections\Auth;

use App\Abstracts\Transformers\PaginatedCollection;

class ModulePaginatedCollection extends PaginatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformers\PaginatedResources\Auth\ModulePaginatedResource::class;
}
