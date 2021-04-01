<?php

namespace App\Foundation\Database;

trait BuildWhere
{
    /**
     * @param  \Illuminate\Http\Request
     * @return \App\Foundation\Database\WhereBuilder
     */
    public function buildWhere($request)
    {
        return new WhereBuilder($request);
    }
}
