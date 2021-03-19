<?php

namespace App\Database\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

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
    public function widgetType()
    {
        return $this->belongsTo(Widget::class);
    }
}
