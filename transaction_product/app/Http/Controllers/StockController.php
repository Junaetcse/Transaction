<?php

namespace App\Http\Controllers;

use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class StockController extends Controller
{
    //

    public function index(){
        $stocks = Stock::all();
        return view('stock.stock-list', compact('stocks'));
    }

    public function create(){
        return view('stock.create');
    }


    public function store(Request $request){

        Stock::create($request->all());
        return Redirect::to('stock');
    }

    public function destroy($id){
        $meta_key=Stock::find($id);
        $meta_key->delete();
        return back();
    }

}
