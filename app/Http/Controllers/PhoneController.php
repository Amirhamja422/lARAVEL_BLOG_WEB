<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class PhoneController extends Controller
{
    //
    public function phoneView(Request $request){
// dd($request->all());
        if ($request->ajax()) {
            $data = DB::table('phones')->get();
               return Datatables::of($data)
                   ->addIndexColumn()
                   ->addColumn('action', function($data){
                      

                       if($data->extension==''){
                        $actionBtn = "<a href='javascript:void(0)' class='btn btn-warning btn-sm user_deactivate'
                        data-id='$data->extension'
                        ><center><i class='fa fa-check text-success'></i></center></a>";
                         }else{
                        $actionBtn = "<a href='javascript:void(0)' class='btn btn-primary btn-sm user_active'
                        data-id='$data->extension'
                        ><center>
                        <i class='fa fa-minus-circle white'></i>
                      </center></a>";  
                    }

                       
                       return $actionBtn;
                   })
                   ->rawColumns(['action'])
                   ->make(true);
                  //  return redirect()->back();
  
           }
           return view('admin.phone');
    }


    
    public function userDeactive(Request $request){
        $data['extension'] = $request->user_deactivate_id;
        $data['extension'] = '0';
        DB::table('phones')->where('extension', $request->user_deactivate_id)->update($data);
        return response()->json([
          'status' => 'success',
        ]);

    }  
}
