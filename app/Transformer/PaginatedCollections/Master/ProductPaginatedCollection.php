<?php

namespace App\Transformer\PaginatedCollections\Master;

use Waffleboss\Foundation\Transformer\PaginatedCollection;

class ProductPaginatedCollection extends PaginatedCollection
{
    /**
     * @return string
     */
    protected function collects()
    {
        return wbcm_paginated_resource('master.product');
    }
}
