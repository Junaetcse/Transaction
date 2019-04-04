<?php

namespace App\Http\Controllers;

use App\CashBalance;
use App\Investment;
use App\Stock;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class TransactionController extends Controller
{
    //


    public function index(){
        $transactions = Transaction::all();
        return view('transaction.list',compact('transactions'));
    }


    public function create()
    {
        $stocks = Stock::all();
        return view('transaction.create', compact('stocks'));
    }

    public function store(Request $request){




        $transaction = $request->get('transaction');
        $quantity = $request->get('quantity');
        $price = $request->get('price');
        $date = $request->get('date');
        $cash_balance = CashBalance::where('key','current_cash_balance')->first();
        $status = null;
        $total_profit = null;
        $amount = $quantity * $price;

        // stock details

        $stock_info = Stock::findOrFail( $request->get('stock_id'));


        if ($transaction == 'buy'){

            if ($cash_balance){
                if ($cash_balance->value < $amount )
                    return Redirect::to('transaction');

                $avg_price = $this->avg_px($stock_info->average_price,$stock_info->stock,$quantity,$price);
                $stock_info->average_price = $avg_price;
                $stock_info->stock = $stock_info->stock + $quantity;
                $cash_balance->value = $cash_balance->value - $amount;
                $cash_balance->save();

            }else{
                return Redirect::to('transaction');
            }


        }else{
            if($stock_info->stock < $quantity){

                return Redirect::to('transaction');
            }
            $stock_info->stock = $stock_info->stock - $quantity;
            $status = $price - $stock_info->average_price;
            $total_profit = $status * $request->quantity;
            $cash_balance->value = $cash_balance->value + $amount;
            $cash_balance->save();
        }
        $stock_info->save();


        (new Transaction())->insert($stock_info->id,$transaction,$quantity,$price,$date,$status,$total_profit);

        return Redirect::to('transaction');
    }


    public function destroy($id){
        $meta_key=Transaction::find($id);
        $meta_key->delete();
        return back();
    }




    public function avg_px($avg_price,$stock,$qty,$price){
        $avg_stock = $avg_price*$stock;
        $qty_price = $qty*$price;
        $total_px = $avg_stock+$qty_price;
        $stock = $stock+$qty;
        return $total_px/$stock;
    }
}
