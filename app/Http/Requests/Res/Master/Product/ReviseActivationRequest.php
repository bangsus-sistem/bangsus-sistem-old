<?php

namespace Waffleboss\Library\Http\Requests\Res\Master\Product;

use Waffleboss\Foundation\Http\AuthIdRequest;

class ReviseActivationRequest extends AuthIdRequest
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
        'action' => 'update',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return wbcm_model('master.product');
    }
}
