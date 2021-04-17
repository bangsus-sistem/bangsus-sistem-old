<?php

namespace App\Transformer\PaginatedCollections\Auth;

use App\Foundation\Transformer\PaginatedCollection;

class ReportPaginatedCollection extends PaginatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\PaginatedResources\Auth\ReportPaginatedResource::class;
}
