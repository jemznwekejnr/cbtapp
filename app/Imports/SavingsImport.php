<?php

namespace App\Imports;

use App\CooperativeSavings;
use Maatwebsite\Excel\Concerns\ToModel;

use Auth;

class SavingsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CooperativeSavings([
            //
            'ippisnumber' => $row[0],
            'name' => $row[1],
            'amount' => $row[2],
            'month' => $row[3],
            'paymentstatus' => 'Confirmed',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => Auth::user()->id,
        ]);
    }
}
