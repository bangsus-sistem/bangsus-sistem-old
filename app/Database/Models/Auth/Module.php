<?php

namespace App\Database\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use App\Database\Models\Concerns\Common\NoTimestamp;

class Module extends Model
{
    use NoTimestamp;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function features()
    {
        return $this->hasMany(Feature::class);
    }
}
