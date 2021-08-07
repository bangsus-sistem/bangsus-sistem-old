<?php

namespace App\Http\Requests\Api\Master\Product;

use Waffleboss\Foundation\Http\AuthIdRequest;
use Illuminate\Validation\Rule;

class AmendRequest extends AuthIdRequest
{
    /**
     * @var string
     */
    protected $type = 'feature';

    /**
     * @var array
     */
    protected $refs = [
        'module' => 'product',
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return wbcm_model('master.product');
    }

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [
            'code' => [
                'nullable',
                'max:200',
                Rule::unique(wbcm_model('master.product'), 'code')
                    ->ignore($this->input('id')),
            ],
            'name' => [
                'nullable',
                'max:200',
            ],
            'product_type_id' => [
                'nullable',
                'wbl_exists:'.wbcm_model('master.product_type'),
            ],
            'product_category_id' => [
                'nullable',
                'wbl_exists:'.wbcm_model('master.product_category'),
            ],
            'image_id' => [
                'nullable',
                'wbl_exists:'.wbcm_model('storage.image'),
            ],
            'unit_id' => [
                'nullable',
                'wbl_exists:'.wbcm_model('master.unit'),
            ],
            'second_unit_id' => [
                'nullable',
                'wbl_exists:'.wbcm_model('master.unit'),
            ],
            'second_ratio' => [
                'nullable',
                'wbl_max_number',
            ],
            'third_unit_id' => [
                'nullable',
                'wbl_exists:'.wbcm_model('master.unit'),
            ],
            'third_ratio' => [
                'nullable',
                'wbl_max_number',
            ],
            'fourth_unit_id' => [
                'nullable',
                'wbl_exists:'.wbcm_model('master.unit'),
            ],
            'fourth_ratio' => [
                'nullable',
                'wbl_max_number',
            ],
            'fifth_unit_id' => [
                'nullable',
                'wbl_exists:'.wbcm_model('master.unit'),
            ],
            'fifth_ratio' => [
                'nullable',
                'wbl_max_number',
            ],
            'inventory_account_id' => [
                'nullable',
                'wbl_exists:'.wbcm_model('accounting.account'),
                'wbl_account_type_is:inventory',
            ],
            'purchase_account_id' => [
                'nullable',
                'wbl_exists:'.wbcm_model('accounting.account'),
                'wbl_account_type_is_either:cost_of_purchase,equipment_cost',
            ],
            'purchase_return_account_id' => [
                'nullable',
                'wbl_exists:'.wbcm_model('accounting.account'),
                'wbl_account_type_is:purchase_return',
            ],
            'sales_account_id' => [
                'nullable',
                'wbl_exists:'.wbcm_model('accounting.account'),
                'wbl_account_type_is:sales',
            ],
            'sales_return_account_id' => [
                'nullable',
                'wbl_exists:'.wbcm_model('accounting.account'),
                'wbl_account_type_is:sales_return',
            ],
            'inventory_adjustment_income_account_id' => [
                'nullable',
                'wbl_exists:'.wbcm_model('accounting.account'),
                'wbl_account_type_is:inventory_adjustment_income',
            ],
            'inventory_adjustment_expense_account_id' => [
                'nullable',
                'wbl_exists:'.wbcm_model('accounting.account'),
                'wbl_account_type_is:inventory_adjustment_expense',
            ],
            'monitor_stock' => [
                'nullable',
                'boolean'
            ],
            'all_purchase' => [
                'nullable',
                'boolean'
            ],
            'all_sales' => [
                'nullable',
                'boolean'
            ],
            'all_incoming_mutation' => [
                'nullable',
                'boolean'
            ],
            'all_outgoing_mutation' => [
                'nullable',
                'boolean'
            ],
            'description' => [
                'nullable',
                'max:1000',
            ],
            'note' => [
                'nullable',
                'max:1000',
            ],
            'all_branch_types' => [
                'nullable',
                'boolean',
            ],
            'branch_type_product' => [
                'nullable',
                'array',
            ],
            'branch_type_product.*.branch_type_id' => [
                'nullable',
                'wbl_exists:'.wbcm_model('system.branch_type'),
            ],
            'branch_type_product.*.purchase' => [
                'nullable',
                'boolean',
            ],
            'branch_type_product.*.sales' => [
                'nullable',
                'boolean',
            ],
            'branch_type_product.*.incoming_mutation' => [
                'nullable',
                'boolean',
            ],
            'branch_type_product.*.outgoing_mutation' => [
                'nullable',
                'boolean',
            ],
            'all_branches' => [
                'nullable',
                'boolean',
            ],
            'branch_product' => [
                'nullable',
                'array',
            ],
            'branch_product.*.branch_id' => [
                'nullable',
                'wbl_exists:'.wbcm_model('system.branch'),
            ],
            'branch_product.*.purchase' => [
                'nullable',
                'boolean',
            ],
            'branch_product.*.sales' => [
                'nullable',
                'boolean',
            ],
            'branch_product.*.incoming_mutation' => [
                'nullable',
                'boolean',
            ],
            'branch_product.*.outgoing_mutation' => [
                'nullable',
                'boolean',
            ],
        ];
    }
}
