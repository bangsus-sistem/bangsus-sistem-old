<?php

namespace App\Foundation\Database\Eloquent;

interface AuthModel
{
    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getAuthorization();
}
