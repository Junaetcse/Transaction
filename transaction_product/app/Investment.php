<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    //

    protected $fillable = [ 'date','amount','investment_status'];



    public function insert($date,$amount,$status){

        $this::create([
            'date' => $date,
            'amount' => $amount,
            'investment_status' => $status
        ]);
    }

}
