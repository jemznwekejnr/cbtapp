<?php

namespace App\Exports;

use App\Variations;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Auth;
use DB;


class VariationExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    use Exportable;

    public function __construct(string $month)
    {
        $this->month = $month;
        
        return $this;
    }
    
    public function collection()
    {
        
        $variations = Variations::select('ippisnumber', 'name', 'savings', 'normalloan', 'softloan', 'shop', 'business', 'total', 'month')->where('month', $this->month)->get();
            
            return $variations;
    }
    
    public function headings(): array{
        return['IPPIS Number', 'Name', 'Savings Account', 'Normal Loan Repayment', 'Soft Loan Repayment', 'Shop', 'Business', 'Total', 'Month'];
    }
}
