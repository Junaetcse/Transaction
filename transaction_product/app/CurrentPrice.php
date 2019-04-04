<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrentPrice extends Model
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
        $current_price = CurrentPrice::where('key','current_price')->first();
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
            (new CurrentPrice())->insert('current_price',$amount);
        }


    }
}
