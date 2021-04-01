<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class WidgetType extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function widgets()
    {
        return $this->hasMany(Widget::class);
    }
}
