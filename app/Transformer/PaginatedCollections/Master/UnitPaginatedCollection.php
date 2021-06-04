<?php

namespace App\Transformer\PaginatedCollections\Master;

use App\Foundation\Transformer\PaginatedCollection;

class UnitPaginatedCollection extends PaginatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\PaginatedResources\Master\UnitPaginatedResource::class;
}
