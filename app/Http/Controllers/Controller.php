<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Platform\Base\ControllerBase;

class Controller extends ControllerBase
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
