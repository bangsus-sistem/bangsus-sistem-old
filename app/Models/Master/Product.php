<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use Waffleboss\Library\Models\Concerns\{
    HasUserTimestamps,
    HasUserDelete,
    HasImage,
    HasBranches,
    ActiveFlag,
    LockedFlag,
};

class Product extends Model
{
    use SoftDeletes, HasUserTimestamps, HasUserDelete, HasImage, HasBranches,
        ActiveFlag, LockedFlag;

    /**
     * @var array
     */
    protected $casts = [
        'second_ratio' => 'float',
        'third_ratio' => 'float',
        'fourth_ratio' => 'float',
        'fifth_ratio' => 'float',
        'monitor_stock' => 'boolean',
        'all_branch_types' => 'boolean',
        'all_branches' => 'boolean',
        'all_purchase' => 'boolean',
        'all_sales' => 'boolean',
        'all_incoming_mutation' => 'boolean',
        'all_outgoing_mutation' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productType()
    {
        return $this->belongsTo(wbcm_model('master.product_type'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productCategory()
    {
        return $this->belongsTo(wbcm_model('master.product_category'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo(wbcm_model('master.unit'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function secondUnit()
    {
        return $this->belongsTo(
            wbcm_model('master.unit'),
            'second_unit_id',
            'id'
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function thirdUnit()
    {
        return $this->belongsTo(
            wbcm_model('master.unit'),
            'third_unit_id',
            'id'
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fourthUnit()
    {
        return $this->belongsTo(
            wbcm_model('master.unit'),
            'fourth_unit_id',
            'id'
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fifthUnit()
    {
        return $this->belongsTo(
            wbcm_model('master.unit'),
            'fifth_unit_id',
            'id'
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inventoryAccount()
    {
        return $this->belongsTo(wbcm_model('accounting.account'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function purchaseAccount()
    {
        return $this->belongsTo(wbcm_model('accounting.account'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function purchaseReturnAccount()
    {
        return $this->belongsTo(wbcm_model('accounting.account'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function salesAccount()
    {
        return $this->belongsTo(wbcm_model('accounting.account'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function salesReturnAccount()
    {
        return $this->belongsTo(wbcm_model('accounting.account'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usageAccount()
    {
        return $this->belongsTo(wbcm_model('accounting.account'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inventoryAdjustmentIncomeAccount()
    {
        return $this->belongsTo(wbcm_model('accounting.account'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inventoryAdjustmentExpenseAccount()
    {
        return $this->belongsTo(wbcm_model('accounting.account'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function branchTypes()
    {
        return $this->belongsToMany(wbcm_model('system.branch_type'))
            ->using(wbcm_model('pivot.branch_type_product'))
            ->withPivot(
                'purchase', 'sales', 'incoming_mutation', 'outgoing_mutation'
            );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function branches()
    {
        return $this->belongsToMany(wbcm_model('system.branch'))
            ->using(wbcm_model('pivot.branch_product'))
            ->withPivot(
                'purchase', 'sales', 'incoming_mutation', 'outgoing_mutation'
            );
    }
}
