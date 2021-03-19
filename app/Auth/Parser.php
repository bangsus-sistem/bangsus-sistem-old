<?php

namespace App\Auth;

abstract class Parser
{
    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    abstract public function get();
}
