<?php

namespace App\Transformer\PaginatedResources\Master;

use Waffleboss\Foundation\Transformer\PaginatedResource;

class ProductPaginatedResource extends PaginatedResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'product_type' => wbcm_paginated_resource('master.product_type', true, $this->productType),
            'product_category' => wbcm_paginated_resource('master.product_category', true, $this->productCategory),
            'image' => wbcm_single_resource('storage.image', true, $this->image),
            'unit' => wbcm_paginated_resource('master.unit', true, $this->unit),
            'active' => (bool) $this->active,
            'locked' => (bool) $this->locked,
            'monitor_stock' => (bool) $this->monitor_stock,
        ];
    }
}
