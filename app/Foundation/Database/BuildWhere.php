<?php

namespace App\Foundation\Database;

trait BuildWhere
{
    /**
     * @return \App\Foundation\Database\WhereBuilder
     */
    public function buildWhere()
    {
        return new WhereBuilder();
    }
}
