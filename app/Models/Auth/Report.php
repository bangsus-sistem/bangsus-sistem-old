<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use App\Foundation\Database\Eloquent\AuthModel;

class Report extends Model implements AuthModel
{
    /**
     * @var boolean
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
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
     * @return \App\Models\Auth\Report
     */
    public static function getAuthorization($refs)
    {
        return static::where('ref', $refs['report'])
            ->first();
    }
}
