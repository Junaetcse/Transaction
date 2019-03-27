<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //

    protected $fillable = [
        'ticket',
        'current_price',
        'average_price',
        'stock',
    ];
}
