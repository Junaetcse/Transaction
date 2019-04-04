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
                    <a class="btn btn-success" href="/stock/create">Create Stock</a>
                    <div class="widget-title">
                        <a class="btn" style="margin-top: 4px"><i class="icon-refresh"></i></a>
                        <h5>Stock List</h5>
                    </div>

                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Ticker</th>
                                <th>Name</th>
                                <th>Current_price</th>
                                <th>Average_price</th>
                                <th>Stock</th>

                            </tr>
                            </thead>
                            <tbody class="parent">
                            @foreach($stocks as $stock)

                            <tr class="odd">
                                <td>{{$stock->ticket}}</td>
                                <td >{{$stock->name}}</td>
                                <td class="key" data-name="{{$stock->ticket}}" >{{$stock->current_price}}</td>
                                <td class="center">{{$stock->average_price}}</td>
                                <td class="center"> {{$stock->stock}}</td>
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