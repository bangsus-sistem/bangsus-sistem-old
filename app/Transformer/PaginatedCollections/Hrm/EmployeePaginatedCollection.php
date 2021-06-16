<?php

namespace App\Transformer\PaginatedCollections\Hrm;

use App\Foundation\Transformer\PaginatedCollection;

class EmployeePaginatedCollection extends PaginatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\PaginatedResources\Hrm\EmployeePaginatedResource::class;
}
