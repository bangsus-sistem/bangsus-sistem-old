<?php

namespace App\Transformer\PaginatedCollections\System;

use App\Foundation\Transformer\PaginatedCollection;

class BranchTypePaginatedCollection extends PaginatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\PaginatedResources\System\BranchTypePaginatedResource::class;
}
