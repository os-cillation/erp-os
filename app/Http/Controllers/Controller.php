<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var mixed
     */
    protected $timeLimitStart;

    /**
     * @var mixed
     */
    protected $timeLimitEnd;

    public function __construct(Request $request)
    {
        $this->timeLimitStart = $request->get('time_limit_start', Carbon::now()->startOfMonth());
        $this->timeLimitEnd = $request->get('time_limit_end', Carbon::now());
    }
}
