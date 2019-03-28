<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //

    protected $fillable = [
        'ticket',
        'name',
        'current_price',
        'average_price',
        'stock',
    ];


    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
}
