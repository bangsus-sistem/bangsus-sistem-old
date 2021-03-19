<?php

namespace App\Auth;

class Factory
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Auth\Permission
     */
    public static function make($request)
    {
        $permissionType = $request->permissionType;
        $permissionClass = ucfirst($permissionType).'Permission';

        return new $permission($request);
    }
}
