<?php

namespace App\Transformer\SingleCollections\Master;

use Waffleboss\Foundation\Transformer\SingleCollection;

class ProductSingleCollection extends SingleCollection
{
    /**
     * @return string
     */
    protected function collects()
    {
        return wbcm_single_resource('master.product');
    }
}
