<?php

namespace App\Http\Controllers;

use App\CurrentPrice;
use App\Investment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class InvestmentController extends Controller
{
    //

    public function __construct()
    {

    }

    public function index(){
        $current_price = \App\CurrentPrice::where('key','current_price')->first();
        $investments = Investment::all();
        return view('investment.list',compact('investments','current_price'));
    }


    public function create(){
        return view('investment.create');
    }


    public function store(Request $request){
        $date = $request->get('date');
        $amount = $request->get('amount');
        $status = $request->get('investment_status');
        (new CurrentPrice())->updateCash($status,$amount);
        (new Investment())->insert($date,$amount,$status);
        return Redirect::to('investment');
    }
}
