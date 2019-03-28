<?php

namespace App\Http\Controllers;

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

        $stock_info =Stock::findOrFail( $request->get('stock_id'));
        $status = null;
        $total_profit = null;

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



        Transaction::create([
            'stock_id' => $request->get('stock_id'),
            'transaction' => $request->get('transaction'),
            'quantity' => $request->get('quantity'),
            'price' => $request->get('price'),
            'date' => $request->get('date'),
            'transaction_status' => $status,
            'total_porfitloss'=> $total_profit
        ]);
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
