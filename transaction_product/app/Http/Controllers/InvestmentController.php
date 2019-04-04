<?php

namespace App\Http\Controllers;

use App\CashBalance;
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
        $cash_balance = \App\CashBalance::where('key','current_cash_balance')->first();
        $investments = Investment::all();
        return view('investment.list',compact('investments','cash_balance'));
    }


    public function create(){
        return view('investment.create');
    }


    public function store(Request $request){
        $date = $request->get('date');
        $amount = $request->get('amount');
        $status = $request->get('investment_status');
        (new CashBalance())->updateCash($status,$amount);
        (new Investment())->insert($date,$amount,$status);
        return Redirect::to('investment');
    }
}
