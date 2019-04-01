<?php

namespace App\Http\Controllers;

use App\Stock;
use GuzzleHttp\Client;
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

    public function addStock(){
        return view('stock.stock-item');
    }


    public function stockSearch(Request $request){
       // dd($request->keyword);
        $key = $request->keyword;
        $url ='https://www.alphavantage.co/query?function=SYMBOL_SEARCH&keywords='.$key.'&apikey=6N4DLMBGUI1912D9';
        $client = new Client();

        $req = $client->get($url);
        $responses = $req->getBody()->getContents();
        return view('stock.stock-item')->with('responses', json_decode($responses, true));
    }
}
