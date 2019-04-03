<?php

namespace App\Http\Controllers;

use App\CurrentPrice;
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
        $current_price = CurrentPrice::where('key','current_price')->first();
        $stock_info =Stock::findOrFail( $request->get('stock_id'));
        $status = null;
        $total_profit = null;
        $amount = $request->get('quantity') * $request->get('price');


        if ($request->get('transaction') == 'buy'){
            $avg_price = $this->avg_px($stock_info->average_price,$stock_info->stock,$request->quantity,$request->price);
            $stock_info->average_price = $avg_price;
            $stock_info->stock = $stock_info->stock + $request->quantity;


        }else{
            $stock_info->stock = $stock_info->stock - $request->quantity;
            $status = $request->price - $stock_info->average_price;
            $total_profit = $status * $request->quantity;
        }
        $stock_info->save();


        if ($request->get('transaction') == 'buy'){
            if ($request->price > $current_price){
                Transaction::create([
                    'stock_id' => $request->get('stock_id'),
                    'transaction' => $request->get('transaction'),
                    'quantity' => $request->get('quantity'),
                    'price' => $request->get('price'),
                    'date' => $request->get('date'),
                    'transaction_status' => $status,
                    'total_porfitloss'=> $total_profit
                ]);
            }

        }else{
            Transaction::create([
                'stock_id' => $request->get('stock_id'),
                'transaction' => $request->get('transaction'),
                'quantity' => $request->get('quantity'),
                'price' => $request->get('price'),
                'date' => $request->get('date'),
                'transaction_status' => $status,
                'total_porfitloss'=> $total_profit
            ]);
        }


        Investment::create([
            'date' => $request->get('date'),
            'amount' => $amount,
            'investment_status' => $request->get('transaction') == 'buy' ? 'investment' : 'withdrawal'
        ]);



        if ($current_price){
            $price = $current_price->value;
             if ($request->get('transaction') == 'buy'){
                 $new_price = $price - $amount;
             }else{
                 $new_price = $price + $amount;
             }
            $current_price->value = $new_price;
             $current_price->save();
        }else{
            CurrentPrice::create([
                    'key' => 'current_price',
                    'value' => '0.0'
            ]);
        }

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
