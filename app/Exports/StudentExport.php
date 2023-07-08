<?php

namespace App\Exports;

/* use Maatwebsite\Excel\Concerns\FromCollection;
 */
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StudentExport implements FromView{

    public function view(): View
    {
        $data = DB::table('crm_food')->get();
        return view('exports.studentdata', [
            'students' => $data
        ]);
    }
}
