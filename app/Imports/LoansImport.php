<?php

namespace App\Imports;

use App\CooperativeLoans;
use Maatwebsite\Excel\Concerns\ToModel;

class LoansImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CooperativeLoans([
            //
            'zone' => $row[0],
            'state' => $row[1],
            'lga' => $row[3],
            'ward' => $row[5]
        ]);
    }
}
