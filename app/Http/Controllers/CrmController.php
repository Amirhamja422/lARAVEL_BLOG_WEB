<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\File;
use App\Exports\CrmExport;
use App\Exports\StudentExport;
use Maatwebsite\Excel\Facades\Excel;
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


    /**
     * Download CRM report in excel.
     *
     * @return text/xlsx
     */
    public function crmDataDownload($start_date, $end_date)
    {
        ## check validation
        if (!empty($start_date) && !empty($end_date) && ($start_date <= $end_date)) {
            ## convert date using helper function
            $start_date = $start_date;
            $end_date = $end_date;
            return Excel::download(new CrmExport($start_date . ' 00:00:00', $end_date . ' 23:59:59'), 'users.xlsx');
            ## return to report page
            // return redirect()->back();
        }
    }



    public function fileView(){
        return view('admin.crmupload');
    }


    public function csvUpload(Request $request){
        $title_name = $request->csv_title;
        $file = $request->file('file');
        if(($open = fopen($file->getRealPath(), 'r')) !== FALSE){
        // $r=0;
        while(($row = fgetcsv($open,100,",")) !== FALSE){
        //   if($r>0){
        // print_r($row);
        //   $data = new User();*


          $values = array('user_email' => $row[0],'ip_address' => $row[1],'title_name'=>$title_name);
          DB::table('ip')->insert($values);

        //   $data-save();
        //   }
        //   $r++;
        }
      }
    $return = ['status'=>'success','msg'=>'successfully uploaded file'];

     }




    public function userView(){
        return view('admin.user');
      }


    public function exportExcelFile()
    {
        return Excel::download(new StudentExport, 'students.xlsx');

    }






}

