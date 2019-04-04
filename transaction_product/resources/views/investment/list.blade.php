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
                        <a class="btn btn-success" href="/investment/create">Create Investment</a>
                        <div class="widget-title">
                            <h5>Investment List</h5>
                            @if($cash_balance)
                                <h5 style="color: #003399">Current cash balance (  {{$cash_balance->value}}  )</h5>
                            @endif
                        </div>

                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Investment</th>

                                </tr>
                                </thead>
                                <tbody class="parent">
                                @foreach($investments as $investment)

                                    <tr class="odd">
                                        <td>{{$investment->date}}</td>
                                        <td >{{$investment->amount}}</td>
                                        <td class="center">{{$investment->investment_status}}</td>
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