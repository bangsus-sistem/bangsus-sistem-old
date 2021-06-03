<?php

namespace App\Validation\System\BranchType;

use App\Foundation\Validation\RequestRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\System\BranchType;

class CodeIsChangeableRule extends RequestRule implements Rule
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $branchType = BranchType::findOrFail($this->request->input('id'));
        if ($branchType->branches()->exists()) {
            $this->setMessage(
                'Kode Tipe Cabang sudah tidak bisa diganti karena sudah memiliki Cabang.'
            );
            return false;
        }

        return true;
    }
}
