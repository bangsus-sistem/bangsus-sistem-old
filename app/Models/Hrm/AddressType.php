<?php

namespace App\Models\Hrm;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use App\Models\Concerns\{
    HasUserTimestamps,
    HasUserDelete,
    ActiveFlag,
};

class AddressType extends Model
{
    use SoftDeletes, HasUserTimestamps, HasUserDelete, ActiveFlag;
}
