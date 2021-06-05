<?php

namespace App\Transformer\SingleCollections\Hrm;

use App\Foundation\Transformer\SingleCollection;

class EmployeePhotoTypeSingleCollection extends SingleCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformer\SingleResources\Hrm\EmployeePhotoTypeSingleResource::class;
}
