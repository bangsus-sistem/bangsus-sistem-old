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
            'purchase_discount_account_id' => $this->purchase_discount_account_id,
            'purchase_return_account_id' => $this->purchase_return_account_id,
            'sales_account_id' => $this->sales_account_id,
            'sales_discount_account_id' => $this->sales_discount_account_id,
            'sales_return_account_id' => $this->sales_return_account_id,
            'usage_account_id' => $this->usage_account_id,
            'inventory_adjustment_income_account_id' => $this->inventory_adjustment_income_account_id,
            'inventory_adjustment_expense_account_id' => $this->inventory_adjustment_expense_account_id,
            'input_tax_account_id' => $this->input_tax_account_id,
            'accrued_input_tax_account_id' => $this->accrued_input_tax_account_id,
            'paid_input_tax_account_id' => $this->paid_input_tax_account_id,
            'output_tax_account_id' => $this->output_tax_account_id,
            'accrued_output_tax_account_id' => $this->accrued_output_tax_account_id,
            'paid_output_tax_account_id' => $this->paid_output_tax_account_id,
            'active' => (bool) $this->active,
            'locked' => (bool) $this->locked,
            'monitor_stock' => (bool) $this->monitor_stock,
            'all_branch_types' => (bool) $this->all_branch_types,
            'all_branches' => (bool) $this->all_branches,
            'all_purchase' => (bool) $this->all_purchase,
            'all_sales' => (bool) $this->all_sales,
            'all_incoming_mutation' => (bool) $this->all_incoming_mutation,
            'all_outgoing_mutation' => (bool) $this->all_outgoing_mutation,
            'description' => $this->description,
            'note' => $this->note,
            'user_create_id' => $this->user_create_id,
            'user_update_id' => $this->user_update_id,
            'user_delete_id' => $this->user_delete_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
