<?php

namespace App\Transformer\SingleResources\Master;

use Waffleboss\Foundation\Transformer\SingleResource;

class ProductSingleResource extends SingleResource
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
            'product_type_id' => $this->product_type_id,
            'product_category_id' => $this->product_category_id,
            'image_id' => $this->image_id,
            'unit_id' => $this->unit_id,
            'second_unit_id' => $this->second_unit_id,
            'second_ratio' => (float) $this->second_ratio,
            'third_unit_id' => $this->third_unit_id,
            'third_ratio' => (float) $this->third_ratio,
            'fourth_unit_id' => $this->fourth_unit_id,
            'fourth_ratio' => (float) $this->fourth_ratio,
            'fifth_unit_id' => $this->fifth_unit_id,
            'fifth_ratio' => (float) $this->fifth_ratio,
            'inventory_account_id' => $this->inventory_account_id,
            'purchase_account_id' => $this->purchase_account_id,
            'purchase_return_account_id' => $this->purchase_return_account_id,
            'sales_account_id' => $this->sales_account_id,
            'sales_return_account_id' => $this->sales_return_account_id,
            'usage_account_id' => $this->usage_account_id,
            'inventory_adjustment_income_account_id' => $this->inventory_adjustment_income_account_id,
            'inventory_adjustment_expense_account_id' => $this->inventory_adjustment_expense_account_id,
            'active' => (bool) $this->active,
            'locked' => (bool) $this->locked,
            'monitor_stock' => (bool) $this->monitor_stock,
            'purchase' => (bool) $this->purchase,
            'sales' => (bool) $this->sales,
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
