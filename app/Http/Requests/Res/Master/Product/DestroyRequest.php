<?php

namespace Waffleboss\Library\Http\Requests\Res\Master\Product;

use Waffleboss\Foundation\Http\AuthIdRequest;
use Waffleboss\Library\Validation\Master\Product\ProductIsDeletableRule;

class DestroyRequest extends AuthIdRequest
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
        'action' => 'delete',
    ];

    /**
     * @return string
     */
    protected function model()
    {
        return wbcm_model('master.product');
    }

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [new ProductIsDeletableRule($this)];
    }
}
