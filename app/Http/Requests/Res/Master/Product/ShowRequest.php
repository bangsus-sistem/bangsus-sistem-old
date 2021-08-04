<?php

namespace App\Http\Requests\Res\Master\Product;

use Waffleboss\Foundation\Http\AuthRequest;

class ShowRequest extends AuthRequest
{
    /**
     * @var string
     */
    protected $type = 'feature';

    /**
     * @var array
     */
    protected $refs = [
        'module' => 'product',
        'action' => 'read',
    ];
}
