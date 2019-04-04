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
                    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                        <h5>Investment table</h5>
                        @if($current_price)
                        <h5 style="color: #003399">Current cash balance (  {{$current_price->value}}  )</h5>
                        @endif
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>investment_status</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($investment as $invest)
                                <tr class="odd gradeX">
                                    <td>{{$invest->date}}</td>
                                    <td class="center">{{$invest->amount}}</td>
                                    <td class="center">{{$invest->investment_status}}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                        <h5>Stock table</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Ticker</th>
                                <th>Current_price</th>
                                <th>Average_price</th>
                                <th>Stock</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($stocks as $stock)
                                <tr class="odd gradeX">
                                    <td>{{$stock->ticket}}</td>
                                    <td class="center">{{$stock->current_price}}</td>
                                    <td class="center">{{$stock->average_price}}</td>
                                    <td class="center"> {{$stock->stock}}</td>
                                    <td>

                                        <form action="{{ route('stock.destroy',$stock->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button height="10px"; class="btn btn-info btn-mini">Delete
                                            </button>
                                        </form>



                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                        <h5>Transaction table</h5>
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
                                <th>Action</th>
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

                                    <td>

                                        <form action="{{ route('transaction.destroy',$transaction->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button height="10px"; class="btn btn-info btn-mini">Delete
                                            </button>
                                        </form>

                                    </td>
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
<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
    <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>

@endsection