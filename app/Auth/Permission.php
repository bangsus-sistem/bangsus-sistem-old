<?php

namespace App\Auth;

use App\Database\Models\Auth\User;

abstract class Permission
{
    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * @var \App\Database\Models\Auth\User
     */
    protected $user;

    /**
     * @var bool
     */
    protected $result;

    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function __construct($request)
    {
        $this->request = $request;
        $this->setUser();
        $this->boot();
    }

    /**
     * @return void
     */
    private function setUser()
    {
        $this->user = User::findOrFail($this->request->user()->id);
    }

    /**
     * @return void
     */
    protected function boot()
    {
        //
    }

    /**
     * @return bool
     */
    public function result()
    {
        if (is_null($this->result))
            throw new LogicException('The result is not yet settled');

        return $this->result;
    }

    /**
     * @return bool
     */
    abstract public function call();
}
