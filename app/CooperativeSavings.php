<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CooperativeSavings extends Model
{
    //
    protected $table = 'cooperativesavings';

    protected $fillable = [
        'ippisnumber', 'name', 'amount', 'month', 'paymentstatus', 'created_at', 'updated_at', 'updated_by'
    ];
}
