<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CooperativeLoans extends Model
{
    //add table
    protected $table = 'loanrequest';
    
    protected $fillable = [
        'name', 'ippisnumber', 'loantype', 'requestedamount', 'adminfee', 'repaymentmethod', 'recipientname', 'created_at', 'updated_at', 'updated_by'
    ];
}
