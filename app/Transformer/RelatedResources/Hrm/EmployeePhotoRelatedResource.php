<?php

namespace App\Transformer\RelatedResources\Hrm;

use App\Foundation\Transformer\RelatedResource;
use App\Transformer\SingleResources\Auth\UserSingleResource;
use App\Transformer\SingleResources\Hrm\{
    EmployeeSingleResource,
    EmployeePhotoTypeSingleResource,
};
use App\Transformer\SingleResources\Storage\Image;

class EmployeePhotoRelatedResource extends RelatedResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'employee' => new EmployeeSingleResource($this->employee),
            'photo_type' => new PhotoTypeSingleResource($this->photoType),
            'image' => new ImageSingleResource($this->image),
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
