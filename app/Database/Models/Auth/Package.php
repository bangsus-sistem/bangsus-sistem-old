<?php

namespace App\Database\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use App\Database\Models\Concerns\Common\NoTimestamp;

class Package extends Model
{
    use NoTimestamp;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
