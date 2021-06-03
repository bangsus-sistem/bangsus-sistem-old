<?php

namespace App\Http\Requests\Res\System\BranchType;

use App\Foundation\Http\AuthIdRequest;
use App\Validation\System\BranchType\BranchTypeIsDeletableRule;

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
    protected $model = '\App\Models\System\BranchType';

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [new BranchTypeIsDeletableRule($this)];
    }
}
