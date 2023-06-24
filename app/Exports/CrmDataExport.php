<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
class CrmDataExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

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

        /**
     * custom query
     *
     * @return void
     */
    public function query()
    {
        return DB::table('crm_food')
                ->whereBetween('date', [$this->start_date, $this->end_date])
                ->limit(1000)
                ->orderBy('date', 'asc');
    }



    
    /**
     * covert data if need
     *
     * @param [type] $row
     * @return array
     */
    public function map($row): array
    {
        return [
            $row->date,
            $row->name,
            $row->phone,
            $row->email,
            $row->type,
 
        ];
    }

    /**
     * export report header
     * 
     * @return text
     */
    public function headings(): array
    {
        return ['Date', 'Name', 'Phone', 'Email', 'Call Type'];
    }
}
