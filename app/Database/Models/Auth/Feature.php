<?php

namespace App\Database\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use App\Database\Models\Concerns\Common\NoTimestamp;

class Feature extends Model
{
    use NoTimestamp;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function action()
    {
        return $this->belongsTo(Action::class);
    }
}
