<?php

namespace App\Auth;

use App\Database\Models\Auth\Feature;
use App\Exceptions\RequestAuthorizationException;

class RequestedFeatureParser
{
    /**
     * @var string
     */
    protected $moduleRef;

    /**
     * @var string
     */
    protected $actionRef;

    /**
     * @param  string  $moduleRef
     * @param  string  $actionRef
     */
    public function __construct($moduleRef, $actionRef)
    {
        $this->moduleRef = $moduleRef;
        $this->actionRef = $actionRef;
    }

    /**
     * @return \App\Database\Models\Auth\Feature
     */
    public function get()
    {
        $feature = Feature::whereHas(
            'module',
            fn ($query) => $query->where('ref', $this->moduleRef)
        )
            ->whereHas(
                'action',
                fn ($query) => $query->where('ref', $this->actionRef)
            )
            ->first();

        if (is_null($feature))
            throw new RequestAuthorizationException(
                'The requested feature not found'
            );

        return $feature;
    }
}
