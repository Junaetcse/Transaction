@extends('base-layout')

@section('content')
<div id="content">
    <div id="content-header">
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <a class="btn btn-success" href="/transaction/create">Create Transaction</a>
                    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                        <h5>Transaction list</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Stock</th>
                                <th>Transaction type</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>Profit/Loss per Stock</th>
                                <th>TotalProfit/Loss</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($transactions as $transaction)
                                <tr class="odd gradeX">
                                    <td>{{$transaction->stock->ticket}}</td>
                                    <td class="center">{{$transaction->transaction}}</td>
                                    <td class="center">{{$transaction->quantity}}</td>
                                    <td class="center"> {{$transaction->price}}</td>
                                    <td>{{$transaction->date}}</td>
                                    <td class="center">{{$transaction->transaction_status}}</td>
                                    <td class="center">{{ number_format($transaction->total_porfitloss, 2, '.', '')}} </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
    <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>

@endsection