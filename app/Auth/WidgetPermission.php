<?php

namespace App\Auth;

use App\Database\Models\Auth\User;
use App\Database\Models\Auth\RoleWidget;
use LogicException;

class WidgetPermission extends Permission
{
    /**
     * @var \App\Database\Models\Auth\Widget
     */
    protected $requestedWidget;

    /**
     * @return void
     */
    protected function boot()
    {
        $this->setRequestedWidget();
    }

    /**
     * @return void
     */
    private function setRequestedWidget()
    {
        $this->requestedWidget = with(
            new RequestedWidgetParser(
                $this->request->moduleRef,
                $this->request->widgetTypeRef,
            )
        )->get();
    }

    /**
     * @return \App\Http\Authorizations\FeaturePermission
     */
    public function verify()
    {
        if (config('auth.role.with_all_widget_field')) {
            if ($this->checkIfRoleHasAllWidgetPrivilege()) {
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
     * @return bool
     */
    private function checkIfRoleHasAllWidgetPrivilege()
    {
        return $this->user->role->all_widget;
    }

    /**
     * @return bool
     */
    private function checkIfRoleIsAuthorized()
    {
        $roleWidget = with(new RoleWidgetParser(
            $this->user->role,
            $this->requestedWidget,
        ))->get();

        if (is_null($roleWidget)) return false;

        return $roleWidget->access;
    }

    /**
     * @return bool
     */
    public function call()
    {
        return $this->verify()->result();
    }
}
