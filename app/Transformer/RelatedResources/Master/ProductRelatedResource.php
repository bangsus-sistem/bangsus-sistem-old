<?php

namespace App\Transformer\RelatedResources\Master;

use Waffleboss\Foundation\Transformer\RelatedResource;

class ProductRelatedResource extends RelatedResource
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
            'product_type' => wbcm_single_resource('master.product_type'),
            'product_category' => wbcm_single_resource('master.product_category'),
            'image' => wbcm_single_resource('storage.image'),
            'unit' => wbcm_single_resource('master.unit'),
            'second_unit' => wbcm_single_resource('master.unit'),
            'second_ratio' => (float) $this->second_ratio,
            'third_unit' => wbcm_single_resource('master.unit'),
            'third_ratio' => (float) $this->third_ratio,
            'fourth_unit' => wbcm_single_resource('master.unit'),
            'fourth_ratio' => (float) $this->fourth_ratio,
            'fifth_unit' => wbcm_single_resource('master.unit'),
            'fifth_ratio' => (float) $this->fifth_ratio,
            'inventory_account' => wbcm_single_resource('accounting.account'),
            'purchase_account' => wbcm_single_resource('accounting.account'),
            'purchase_return_account' => wbcm_single_resource('accounting.account'),
            'sales_account' => wbcm_single_resource('accounting.account'),
            'sales_return_account' => wbcm_single_resource('accounting.account'),
            'usage_account' => wbcm_single_resource('accounting.account'),
            'inventory_adjustment_income_account' => wbcm_single_resource('accounting.account'),
            'inventory_adjustment_expense_account' => wbcm_single_resource('accounting.account'),
            'active' => (bool) $this->active,
            'locked' => (bool) $this->locked,
            'monitor_stock' => (bool) $this->monitor_stock,
            'description' => $this->description,
            'note' => $this->note,
            'user_create' => wbcm_single_resource('auth.user', true, $this->userCreate),
            'user_update' => wbcm_single_resource('auth.user', true, $this->userUpdate),
            'user_delete' => wbcm_single_resource('auth.user', true, $this->userDelete),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
