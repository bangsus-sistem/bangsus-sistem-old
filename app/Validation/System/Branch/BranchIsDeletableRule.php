<?php

namespace App\Validation\System\Branch;

use App\Foundation\Validation\RequestRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\System\Branch;

class BranchIsDeletableRule extends RequestRule implements Rule
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $branch = Branch::findOrFail($this->request->input('id'));
        if ($branch->users()->exists()) {
            $this->setMessage('Cabang sudah memiliki user.');
            return false;
        }

        return true;
    }
}
