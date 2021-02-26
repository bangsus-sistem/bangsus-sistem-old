<?php

namespace App\Database\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use App\Database\Models\Concerns\Common\NoTimestamp;

class Action extends Model
{
    use NoTimestamp;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function features()
    {
        return $this->hasMany(Feature::class);
    }
}
