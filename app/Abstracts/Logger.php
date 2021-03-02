<?php

namespace App\Contracts;

abstract class Logger
{
    /**
     * @param  string  $ip
     * @param  bool  $success
     * @param  array  $data
     * @return void
     */
    abstract public function log($ip, $success, $data);

    /**
     * @return bool
     */
    protected function configFlagAllows()
    {
        return config($this->config);
    }
}
