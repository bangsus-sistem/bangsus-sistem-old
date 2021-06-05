<?php

namespace App\Transformer\PaginatedCollections\Hrm;

use App\Foundation\Transformer\PaginatedCollection;

class EmployeePhotoTypePaginatedCollection extends PaginatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\PaginatedResources\Hrm\EmployeePhotoTypePaginatedResource::class;
}
