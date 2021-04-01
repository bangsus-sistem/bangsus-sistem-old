<?php

namespace App\Foundation\Http;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Foundation\Database\BuildWhere;
use App\Foundation\{
    ManageService,
    TransmitTask,
};

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    use BuildWhere, ManageService, TransmitTask;
}
