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
    ActiveFlag,
    LockedFlag,
};

class Product extends Model
{
    use SoftDeletes, HasUserTimestamps, HasUserDelete, HasImage, ActiveFlag,
        LockedFlag;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productType()
    {
        return $this->hasMany(wbcm_model('master.product_type'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productCategory()
    {
        return $this->hasMany(wbcm_model('master.product_category'));
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
}
