<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = [
        'stock_id',
        'transaction',
        'quantity',
        'price',
        'date',
        'transaction_status'
    ];

}
