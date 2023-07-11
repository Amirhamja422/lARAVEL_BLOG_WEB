<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class inboundController extends Controller
{
    //
    public function inbound(Request $request){
// dd($request->all());
        if ($request->ajax()) {
            $data = DB::table('vicidial_closer_log')->get();
               return Datatables::of($data)
                   ->addIndexColumn()
                   ->addColumn('action', function($data){    
                   })
                   ->rawColumns(['action'])
                   ->make(true);
                  //  return redirect()->back();
  
           }
           return view('admin.inbound');
    }

}
