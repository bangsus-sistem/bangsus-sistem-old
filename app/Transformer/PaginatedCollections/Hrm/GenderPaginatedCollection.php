<?php

namespace App\Transformer\PaginatedCollections\Hrm;

use App\Foundation\Transformer\PaginatedCollection;

class GenderPaginatedCollection extends PaginatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\PaginatedResources\Hrm\GenderPaginatedResource::class;
}
