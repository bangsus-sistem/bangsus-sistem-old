<?php

namespace App\Transformer\PaginatedCollections\Hrm;

use App\Foundation\Transformer\PaginatedCollection;

class JobTitlePaginatedCollection extends PaginatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\PaginatedResources\Hrm\JobTitlePaginatedResource::class;
}
