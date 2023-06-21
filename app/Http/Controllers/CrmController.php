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
            $data = DB::table('crm_food')->get();
               return Datatables::of($data)
                   ->addIndexColumn()
                   ->addColumn('action', function($data){
                        $actionBtn = "<a href='javascript:void(0)' class='btn btn-warning btn-sm user_deactivate'
                        data-id='$data->id'
                        ><center><i class='fa fa-check text-success'></i></center></a>";   
                       return $actionBtn;
                   })
                   ->rawColumns(['action'])
                   ->make(true);
  
           }
           return view('admin.crm');
    }
 
}
