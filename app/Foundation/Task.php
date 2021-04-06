<?php

namespace App\Foundation;

use App\Foundation\Database\{
    BuildWhere,
    Transaction,
};

abstract class Task
{
    use BuildWhere, Transaction;

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    abstract public function handle($request);
}
