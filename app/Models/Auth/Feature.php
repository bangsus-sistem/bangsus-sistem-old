<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use App\Foundation\Database\Eloquent\AuthModel;

class Feature extends Model implements AuthModel
{
    /**
     * @var boolean
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
    public function action()
    {
        return $this->belongsTo(Action::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * @param  array  $refs
     * @return \App\Models\Auth\Feature
     */
    public static function getAuthorization($refs)
    {
        return static::whereHas('module',
            fn ($query) => $query->where('ref', $refs['module'])
        )
            ->whereHas('action', 
                fn ($query) => $query->where('ref', $refs['action'])
            )
            ->first();
    }
}
