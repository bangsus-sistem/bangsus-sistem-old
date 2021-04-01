<?php

namespace App\Transformers\PaginatedCollections\Logs;

use App\Abstracts\Transformers\PaginatedCollection;

class FeatureLogPaginatedCollection extends PaginatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformers\PaginatedResources\Logs\FeatureLogPaginatedResource::class;
}
