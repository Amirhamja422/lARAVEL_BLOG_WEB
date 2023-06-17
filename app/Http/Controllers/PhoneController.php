<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class PhoneController extends Controller
{
    //
    public function phoneView(Request $request){

        if ($request->ajax()) {
            $data = DB::table('phones')->get();
               return Datatables::of($data)
                   ->addIndexColumn()
                   ->addColumn('action', function($row){
                       $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                       return $actionBtn;
                   })
                   ->rawColumns(['action'])
                   ->make(true);
                  //  return redirect()->back();
  
           }
           return view('admin.phone');
    }
}
