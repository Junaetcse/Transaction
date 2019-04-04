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
        'transaction_status',
        'total_porfitloss'
    ];


    public function stock(){
        return $this->belongsTo(Stock::class);
    }


    public function insert($stock_id,$transaction,$quantity,$price,$date,$status,$profit){
        $this::create([
            'stock_id' => $stock_id,
            'transaction' => $transaction,
            'quantity' => $quantity,
            'price' => $price,
            'date' => $date,
            'transaction_status' => $status,
            'total_porfitloss'=> $profit
        ]);

    }
}
