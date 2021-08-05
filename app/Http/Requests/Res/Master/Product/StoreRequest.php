<?php

namespace App\Http\Requests\Res\Master\Product;

use Waffleboss\Foundation\Http\AuthRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends AuthRequest
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
        'action' => 'create',
    ];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'code' => [
                'required',
                'max:200',
                'unique:'.wbcm_model('master.product'),
            ],
            'name' => [
                'required',
                'max:200',
            ],
            'product_type_id' => [
                'required',
                'wbl_exists:'.wbcm_model('master.product_type'),
            ],
            'product_category_id' => [
                'required',
                'wbl_exists:'.wbcm_model('master.product_category'),
            ],
            'image_id' => [
                'required',
                'wbl_exists:'.wbcm_model('storage.image'),
            ],
            'unit_id' => [
                'required',
                'wbl_exists:'.wbcm_model('master.unit'),
            ],
            'second_unit_id' => [
                'required_with_all:third_unit_id,fourth_unit_id,fifth_unit_id',
                'wbl_exists:'.wbcm_model('master.unit'),
            ],
            'second_ratio' => [
                'required_with:second_unit_id',
                'wbl_max_number',
            ],
            'third_unit_id' => [
                'required_with_all:fourth_unit_id,fifth_unit_id',
                'wbl_exists:'.wbcm_model('master.unit'),
            ],
            'third_ratio' => [
                'required_with:third_unit_id',
                'wbl_max_number',
            ],
            'fourth_unit_id' => [
                'required_with:fifth_unit_id',
                'wbl_exists:'.wbcm_model('master.unit'),
            ],
            'fourth_ratio' => [
                'required_with:fourth_unit_id',
                'wbl_max_number',
            ],
            'fifth_unit_id' => [
                'nullable',
                'wbl_exists:'.wbcm_model('master.unit'),
            ],
            'fifth_ratio' => [
                'required_with:fifth_unit_id',
                'wbl_max_number',
            ],
            'inventory_account_id' => [
                Rule::requiredIf($this->boolean('monitor_stock')),
                'wbl_exists:'.wbcm_model('accounting.account'),
                'wbl_account_type_is:inventory',
            ],
            'purchase_account_id' => [
                Rule::requiredIf( ! $this->boolean('monitor_stock') && $this->boolean('purchase')),
                'wbl_exists:'.wbcm_model('accounting.account'),
                'wbl_account_type_is:cost_of_purchase',
            ],
            'purchase_return_account_id' => [
                Rule::requiredIf( ! $this->boolean('monitor_stock') && $this->boolean('purchase')),
                'wbl_exists:'.wbcm_model('accounting.account'),
                'wbl_account_type_is:purchase_return',
            ],
            'sales_account_id' => [
                Rule::requiredIf($this->boolean('sales')),
                'wbl_exists:'.wbcm_model('accounting.account'),
                'wbl_account_type_is:sales',
            ],
            'sales_return_account_id' => [
                Rule::requiredIf($this->boolean('sales')),
                'wbl_exists:'.wbcm_model('accounting.account'),
                'wbl_account_type_is:sales_return',
            ],
            'inventory_adjustment_income_account_id' => [
                Rule::requiredIf($this->boolean('monitor_stock')),
                'wbl_exists:'.wbcm_model('accounting.account'),
                'wbl_account_type_is:inventory_adjustment_income',
            ],
            'inventory_adjustment_expense_account_id' => [
                Rule::requiredIf($this->boolean('monitor_stock')),
                'wbl_exists:'.wbcm_model('accounting.account'),
                'wbl_account_type_is:inventory_adjustment_expense',
            ],
            'monitor_stock' => [
                'required',
                'boolean'
            ],
            'purchase' => [
                'required',
                'boolean'
            ],
            'sales' => [
                'required',
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
            'all_branches' => [
                'required',
                'boolean',
            ],
            'branch_ids' => [
                Rule::requiredIf( ! $this->boolean('all_branches')),
                'array',
            ],
            'branch_ids.*' => [
                Rule::requiredIf( ! $this->boolean('all_branches')),
                'wbl_exists:'.wbcm_model('system.branch'),
            ],
        ];
    }
}
