@extends('base-layout')

@section('content')
<div id="content">
    <div id="content-header">

    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span8">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Transaction Create</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" action="{{url('transaction')}}" method="post">
                            @csrf
                            <div class="control-group">
                                <label class="control-label span5">Select stock</label>
                                <div class="controls" name="stock_id">
                                    <select name="stock_id" >
                                        <option value="">select</option>
                                        @foreach($stocks as $stock)
                                            <option value="{{$stock->id}}" >{{$stock->ticket}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Transaction</label>
                                <div class="controls" name="stock_id">
                                    <select name="transaction" >

                                            <option value="buy" >Buy</option>
                                        <option value="sell" >Sell</option>

                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Quantity</label>
                                <div class="controls">
                                    <input type="number" class="span5" name="quantity" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Price</label>
                                <div class="controls">
                                    <input type="number"  step="any"  class="span5" name="price"  />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Date</label>
                                <div class="controls">
                                    <div  data-date="" class="input-append date datepicker">
                                        <input type="date" name="date"  data-date-format="mm-dd-yyyy" class="span11" >
                                        </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
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

<!--end-Footer-part-->
@endsection