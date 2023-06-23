<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
class CrmController extends Controller
{
    //
    public function crmView(Request $request){
        if ($request->ajax()) {
        ## convert date using helper function
        $start_date = $request->start_date . ' 00:00:00';
        $end_date = $request->end_date . ' 23:59:59';
        $crmData = DB::table('crm_food')
        ->whereBetween('date', [$start_date, $end_date]);
               return Datatables::of($crmData)
                   ->addIndexColumn()
                   ->addColumn('action', function($crmData){
                        $actionBtn = "<a href='javascript:void(0)' class='btn btn-warning btn-sm user_deactivate'
                        data-id='$crmData->id'
                        ><center><i class='fa fa-check text-success'></i></center></a>";   
                       return $actionBtn;
                   })
                   ->rawColumns(['action'])
                   ->make(true);
  
           }
           return view('admin.crm');
    }
 
}
