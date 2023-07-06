<?php

namespace App\Http\Controllers;

use App\Service\DashService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Bus;
use Carbon\Carbon;

class DashboardController extends Controller
{
    //

        public function dashboardView(DashService $dashService)
        {

            ## define variable
            // $sdate = date('Y-m-d') .'00:00:01';
            // dd($sdate);
            // $edate = date('Y-m-d') .'23:59:59';

                ## define variable
                // $currentDate = Carbon::now();

                // // Create Carbon instances for the start and end dates
                // $dateStart = $currentDate->copy()->startOfDay();
                // $dateEnd = $currentDate->copy()->endOfDay();
    
                ## count todays data
            // $dateStart = Carbon::parse($sdate);

            // $dateEnd = Carbon::parse($edate);
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
    
            return view('admin.dashboard', compact('data'));
        

    }
}
