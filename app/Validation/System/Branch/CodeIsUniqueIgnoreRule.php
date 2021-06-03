<?php

namespace App\Validation\System\Branch;

use App\Foundation\Validation\RequestRule;
use Illuminate\Contracts\Validation\Rule;
use App\Models\System\{
    Branch,
    BranchType,
};

class CodeIsUniqueIgnoreRule extends RequestRule implements Rule
{
    /**
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $branch = Branch::find($this->request->input('id'));
        $branchType = BranchType::find($this->request->input('branch_type_id'));
        $code = $branchType->code . $value;

        if (Branch::where('code', $code)->where('id', '!=', $branch->id)->exists()) {
            $this->setMessage('Kode Cabang sudah dipakai.');
            return false;
        }

        return true;
    }
}
