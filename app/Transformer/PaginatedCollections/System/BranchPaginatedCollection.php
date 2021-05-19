<?php

namespace App\Transformer\PaginatedCollections\System;

use App\Foundation\Transformer\PaginatedCollection;

class BranchPaginatedCollection extends PaginatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\PaginatedResources\System\BranchPaginatedResource::class;
}
