<?php

namespace App\Http\Requests\Res\Hrm\JobTitle;

use App\Foundation\Http\AuthIdRequest;
use App\Validation\Hrm\JobTitle\JobTitleIsDeletableRule;

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
        'module' => 'job_title',
        'action' => 'delete',
    ];

    /**
     * @var string
     */
    protected $model = '\App\Models\Hrm\JobTitle';

    /**
     * @return array
     */
    public function additionalRules()
    {
        return [new JobTitleIsDeletableRule($this)];
    }
}
