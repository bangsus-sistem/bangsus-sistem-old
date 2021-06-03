<?php

namespace App\Http\Requests\Res\System\Branch;

use App\Foundation\Http\AuthIdRequest;
use App\Validation\System\Branch\BranchIsDeletableRule;

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
        'module' => 'branch',
        'action' => 'delete',
    ];

    /**
     * @var string
     */
    protected $model = '\App\Models\System\Branch';

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [new BranchIsDeletableRule($this)];
    }
}
