<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CashBalance extends Model
{
    //
    protected $fillable = [ 'key','value'];


    public function insert($key,$value){
        $this::create([
            'key' => $key,
            'value' => $value
        ]);
    }


    public function updateCash($status, $amount){
        $current_price = CashBalance::where('key','current_cash_balance')->first();
        if ($current_price){
            $price = $current_price->value;
            if ($status == 'investment'){
                $new_price = $price + $amount;
            }else{
                $new_price = $price - $amount;
            }
            $current_price->value = $new_price;
            $current_price->save();
        }else{
            (new CashBalance())->insert('current_cash_balance',$amount);
        }


    }
}
