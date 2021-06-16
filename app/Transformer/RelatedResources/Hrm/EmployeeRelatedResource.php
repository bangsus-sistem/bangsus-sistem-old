<?php

namespace App\Transformer\RelatedResources\Hrm;

use App\Foundation\Transformer\RelatedResource;
use App\Transformer\SingleResources\Auth\UserSingleResource;
use App\Transformer\SingleResources\Hrm\{
    BloodTypeSingleResource,
    GenderSingleResource,
};
use App\Transformer\SingleResources\System\BranchSingleResource;

class EmployeeRelatedResource extends RelatedResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'nik' => $this->nik,
            'full_name' => $this->full_name,
            'place_of_birth' => $this->place_of_birth,
            'date_of_birth' => $this->date_of_birth,
            'blood_type' => new BloodTypeSingleResource($this->bloodType),
            'gender' => new GenderSingleResource($this->gender),
            'first_branch' => new BranchSingleResource($this->firstBranch),
            'first_job_title' => new JobTitleRelatedResource($this->firstJobTitle),
            'start_date' => $this->start_date,
            'admitted' => (boolean) $this->admitted,
            'description' => $this->description,
            'note' => $this->note,
            'user_create' => new UserSingleResource($this->userCreate),
            'user_update' => new UserSingleResource($this->userUpdate),
            'user_admit' => new UserSingleResource($this->userAdmit),
            'user_delete' => new UserSingleResource($this->userDelete),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'admitted_at' => $this->admitted_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
