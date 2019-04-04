<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $stocks = \App\Stock::all();
    $transactions = \App\Transaction::all();
    $current_price = \App\CurrentPrice::where('key','current_price')->first();
    $investment = \App\Investment::all();
    return view('welcome',compact('stocks','transactions','current_price','investment'));
});

Route::resource('stock','StockController');
Route::post('stock-search','StockController@stockSearch');
Route::resource('transaction','TransactionController');
Route::post('insert-stock','StockController@insertStock');
Route::get('investment','InvestmentController@index');
Route::get('investment/create','InvestmentController@create');
Route::post('investment/store','InvestmentController@store');