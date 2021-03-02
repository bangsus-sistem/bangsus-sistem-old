<?php

namespace App\Abstracts\Http;

use App\Database\Models\Auth\User;
use App\Database\Models\Auth\RoleFeature;
use LogicException;
use App\Loggers\FeatureLogger;

class Permission
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
        $this->boot();
    }

    /**
     * @return void
     */
    private function boot()
    {
        $this->setUser();
        $this->setRequestedFeature();
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
    private function setRequestedFeature()
    {
        $this->requestedFeature = with(
            new RequestedFeatureParser(
                $this->request->moduleRef,
                $this->request->actionRef,
            )
        )->get();
    }

    /**
     * @return \App\Http\Authorizations\Permission
     */
    public function verify()
    {
        if (config('auth.role.with_all_access_field')) {
            if ($this->checkIfRoleHasAllAccessPrivilege()) {
                $this->result = true;
                return $this;
            }
        }

        if ( ! $this->checkIfRoleIsAuthorized()) {
            $this->result = false;
            return $this;
        }

        $this->result = true;
        return $this;
    }

    /**
     * @return \App\Http\Authorizations\Permission
     */
    public function log()
    {
        FeatureLogger::log(
            $this->request->ip,
            $this->result,
            [
                'user_id' => $this->user->id,
                'feature_id' => $this->requestedFeature->id,
            ]
        );

        return $this;
    }

    /**
     * @return bool
     */
    private function checkIfRoleHasAllAccessPrivilege()
    {
        return $this->user->role->all_access;
    }

    /**
     * @return bool
     */
    private function checkIfRoleIsAuthorized()
    {
        $roleFeature = with(new RoleFeatureParser(
            $this->user->role,
            $this->requestedFeature,
        ))->get();

        if (is_null($roleFeature)) return false;

        return $roleFeature->access;
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
}
