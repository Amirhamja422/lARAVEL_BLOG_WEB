<?php

namespace App\Http\Controllers\APP;

use App\Http\Controllers\Controller;
use App\Service\DashService;
use Carbon\Carbon;

class DashboardapiController extends Controller
{
    //
    public function index(DashService $dashService)
    {

        ## define variable
        $dateStart = Carbon::parse('2023-06-30 00:00:01');
        $dateEnd = Carbon::parse('2023-06-30 23:59:59');
        ## count todays data
        $inbound = $dashService->inboundCalls($dateStart, $dateEnd);
        $outbound = $dashService->outboundCalls($dateStart, $dateEnd);
        $total = ($inbound + $outbound);
    
        ## put data
        $data = array(
            'total' => $total,
            'inbound' => $inbound,
            'outbound' => $outbound
        );

        return $data;
}
}
