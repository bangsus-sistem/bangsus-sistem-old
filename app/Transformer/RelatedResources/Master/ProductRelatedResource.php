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
            'product_type' => wbcm_single_resource('master.product_type', true, $this->productType),
            'product_category' => wbcm_single_resource('master.product_category', true, $this->productCategory),
            'image' => wbcm_single_resource('storage.image', true, $this->image),
            'unit' => wbcm_single_resource('master.unit', true, $this->unit),
            'second_unit' => wbcm_single_resource('master.unit', true, $this->secondUnit),
            'second_ratio' => (float) $this->second_ratio,
            'third_unit' => wbcm_single_resource('master.unit', true, $this->thirdUnit),
            'third_ratio' => (float) $this->third_ratio,
            'fourth_unit' => wbcm_single_resource('master.unit', true, $this->fourthUnit),
            'fourth_ratio' => (float) $this->fourth_ratio,
            'fifth_unit' => wbcm_single_resource('master.unit', true, $this->fifthUnit),
            'fifth_ratio' => (float) $this->fifth_ratio,
            'inventory_account' => wbcm_single_resource('accounting.account', true, $this->inventoryAccount),
            'purchase_account' => wbcm_single_resource('accounting.account', true, $this->purchaseAccount),
            'purchase_discount_account' => wbcm_single_resource('accounting.account', true, $this->purchaseDiscountAccount),
            'purchase_return_account' => wbcm_single_resource('accounting.account', true, $this->purchaseReturnAccount),
            'sales_account' => wbcm_single_resource('accounting.account', true, $this->salesAccount),
            'sales_discount_account' => wbcm_single_resource('accounting.account', true, $this->salesDiscountAccount),
            'sales_return_account' => wbcm_single_resource('accounting.account', true, $this->salesReturnAccount),
            'usage_account' => wbcm_single_resource('accounting.account', true, $this->usageAccount),
            'inventory_adjustment_income_account' => wbcm_single_resource('accounting.account', true, $this->inventoryAdjustmentIncomeAccount),
            'inventory_adjustment_expense_account' => wbcm_single_resource('accounting.account', true, $this->inventoryAdjustmentExpenseAccount),
            'input_tax_account' => wbcm_single_resource('accounting.account', true, $this->inputTaxAccount),
            'accrued_input_tax_account' => wbcm_single_resource('accounting.account', true, $this->accruedInputTaxAccount),
            'paid_input_tax_account' => wbcm_single_resource('accounting.account', true, $this->paidInputTaxAccount),
            'output_tax_account' => wbcm_single_resource('accounting.account', true, $this->outputTaxAccount),
            'accrued_output_tax_account' => wbcm_single_resource('accounting.account', true, $this->accruedOutputTaxAccount),
            'paid_output_tax_account' => wbcm_single_resource('accounting.account', true, $this->paidOutputTaxAccount),
            'active' => (bool) $this->active,
            'locked' => (bool) $this->locked,
            'monitor_stock' => (bool) $this->monitor_stock,
            'all_branch_types' => (bool) $this->all_branch_types,
            'all_branches' => (bool) $this->all_branches,
            'all_purchase' => (bool) $this->all_purchase,
            'all_sales' => (bool) $this->all_sales,
            'all_incoming_mutation' => (bool) $this->all_incoming_mutation,
            'all_outgoing_mutation' => (bool) $this->all_outgoing_mutation,
            'branch_types' => wbcm_pivot_resource('system.branch_type', $this->branchTypes),
            'branches' => wbcm_pivot_resource('system.branch', $this->branches),
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
