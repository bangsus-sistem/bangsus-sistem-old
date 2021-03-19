<?php

namespace App\Auth;

use App\Database\Models\Auth\RoleWidget;

class RoleWidgetParser extends Parser
{
    /**
     * @var \App\Database\Models\Auth\Role
     */
    protected $role;

    /**
     * @var \App\Database\Models\Auth\Widget
     */
    protected $widget;

    /**
     * @param  \App\Database\Models\Auth\Role  $role
     * @param  \App\Database\Models\Auth\Widget  $widget
     */
    public function __construct($role, $widget)
    {
        $this->role = $role;
        $this->widget = $widget;
    }

    /**
     * @return \App\Database\Models\Auth\RoleWidget
     */
    public function get()
    {
        return RoleWidget::where(
            'role_id',
            $this->role->id
        )
            ->where('widget_id', $this->widget->id)
            ->first();
    }
}
