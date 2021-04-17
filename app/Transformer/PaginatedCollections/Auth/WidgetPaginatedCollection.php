<?php

namespace App\Transformer\PaginatedCollections\Auth;

use App\Foundation\Transformer\PaginatedCollection;

class WidgetPaginatedCollection extends PaginatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\PaginatedResources\Auth\WidgetPaginatedResource::class;
}
