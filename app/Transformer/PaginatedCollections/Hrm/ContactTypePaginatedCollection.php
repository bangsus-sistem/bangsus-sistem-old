<?php

namespace App\Transformer\PaginatedCollections\Hrm;

use App\Foundation\Transformer\PaginatedCollection;

class ContactTypePaginatedCollection extends PaginatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\PaginatedResources\Hrm\ContactTypePaginatedResource::class;
}
