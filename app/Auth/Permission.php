<?php

namespace App\Auth;

abstract class Permission
{
    /**
     * @var \Illuminate\Http\Request
     */
    private $request;

    /**
     * @var \App\Database\Models\Auth\User
     */
    private $user;

    /**
     * @var bool
     */
    private $result;

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
    public function boot()
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
