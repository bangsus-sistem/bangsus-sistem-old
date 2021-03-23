<?php

namespace App\Auth;

class Factory
{
    /**
     * @var string
     */
    protected static $namespace = '\\App\\Auth\\';

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Auth\Permission
     */
    public static function make($request)
    {
        $permissionType = $request->permissionType;
        $permissionClass = static::$namespace.ucfirst($permissionType).'Permission';

        return new $permissionClass($request);
    }
}
