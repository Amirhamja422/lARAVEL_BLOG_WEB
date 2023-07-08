<?php

namespace App\Exports;

/* use Maatwebsite\Excel\Concerns\FromCollection;
 */
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CrmExport implements FromView{
    public $start_date;
    public $end_date;
    
    /**
     * global __construct
     *
     * @param $start_date
     * @param $end_date
     */
    public function __construct($start_date, $end_date)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }
    public function view(): View
    {

        $data = DB::table('crm_food')
        ->whereBetween('date', [$this->start_date, $this->end_date])
        ->limit(1000)
        ->orderBy('date', 'asc')->get();
        return view('exports.crmdata', [
            'crm' => $data
        ]);

        dd($data);

    }
}
