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
            'product_type' => wbcm_paginated_resource('master.product_type'),
            'product_category' => wbcm_paginated_resource('master.product_category'),
            'image' => wbcm_paginated_resource('storage.image'),
            'unit' => wbcm_paginated_resource('master.unit'),
            'second_unit' => wbcm_paginated_resource('master.unit'),
            'second_ratio' => (float) $this->second_ratio,
            'third_unit' => wbcm_paginated_resource('master.unit'),
            'third_ratio' => (float) $this->third_ratio,
            'fourth_unit' => wbcm_paginated_resource('master.unit'),
            'fourth_ratio' => (float) $this->fourth_ratio,
            'fifth_unit' => wbcm_paginated_resource('master.unit'),
            'fifth_ratio' => (float) $this->fifth_ratio,
            'active' => (bool) $this->active,
            'locked' => (bool) $this->locked,
            'monitor_stock' => (bool) $this->monitor_stock,
        ];
    }
}
