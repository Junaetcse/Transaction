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
                        <h5>Stock Create</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" action="{{url('stock-search')}}" method="post">
                            @csrf
                            <div class="control-group">
                                <label class="control-label">Stock</label>
                                <div class="controls" id="">
                                    <input type="text" name="keyword" placeholder="Search here..."/>
                                    <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
                                </div>
                            </div>
                        </form>
                        <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                            <h5>Stock List</h5>
                        </div>

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Symbol</th>
                                <th>Name</th>
                                <th>Action</th>


                            </tr>
                            </thead>
                            @if(isset($responses))
                            @foreach($responses['bestMatches'] as $data)
                            <tbody class="table-body">
                                <tr>
                                    <td class="data-symbol" data-symbol="{{$data['1. symbol']}}">{{$data['1. symbol']}}</td>
                                    <td class="data-name" data-name="{{$data['2. name']}}">{{$data['2. name']}}</td>

                                    <td><button class="add-stock">Add</button></td>

                                </tr>

                            </tbody>
                                @endforeach
                        </table>
                        @endif


                        </div>
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
    <div id="footer" class="span12">No data </div>
</div>

@endsection