<?php
namespace App\Service;

use Illuminate\Support\Facades\DB;

class DashService
{
    /**
     * inboundCalls count
     *
     * @param [date] $start_date
     * @param [date] $end_date
     * @return mixed
     */
    public function inboundCalls($start_date, $end_date)
    {
        $aggregate = DB::table('vicidial_closer_log')
    ->whereBetween('call_date', [$start_date, $end_date])
    ->count();
    //    $user = DB::table('vicidial_closer_logs')->whereBetween('call_date', [$start_date.' 00:00:01',$end_date.'23:59:59'])->count();
    //     if(!$user){
    //         return '55'; 
    //  }
    //  if($user){
    //     return '66'; 
    //  }
       return $aggregate;
    }


        /**
     * outboundCalls count
     *
     * @param [date] $start_date
     * @param [date] $end_date
     * @return mixed
     */
    public function outboundCalls($start_date, $end_date)
    {
        return DB::table('vicidial_log')->whereBetween('call_date', [$start_date . ' 00:00:01', $end_date . ' 23:59:59'])->count();
    }
}