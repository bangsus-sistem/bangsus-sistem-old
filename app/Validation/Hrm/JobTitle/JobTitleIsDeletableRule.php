<?php

namespace App\Validation\Hrm\JobTitle;

use App\Foundation\Validation\RequestRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Hrm\JobTitle;

class JobTitleIsDeletableRule extends RequestRule implements Rule
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $jobTitle = JobTitle::findOrFail($this->request->input('id'));
        // if ($jobTitle->items()->exists()) {
        //     $this->setMessage('');
        //     return false;
        // }

        return true;
    }
}
