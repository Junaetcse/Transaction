<!DOCTYPE html>
<html lang="en">
<head>
    <title>Stock Price</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/fullcalendar.css')}}" />
    <link rel="stylesheet" href="{{asset('css/matrix-style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/matrix-media.css')}}" />
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/jquery.gritter.css')}}" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>

        var timeouts = [];

        $(document).ready(function() {
            iterateTableRows();
           // var length =  $(".parent tr").length;
            //setInterval(iterateTableRows, 12000*length+30000); //5s
            refreshData()
        });

        function iterateTableRows() {
            $(".parent tr").each(function() {
                var $priceCell = $(this).find('.key');
                var key = $priceCell.data('name');
                var url = 'https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol='+key+'&apikey=VKA25ZIFB6M9BWH5';
                var timeout = setTimeout(function(key) {
                    $.ajax({
                        type: 'GET',
                        //url: url,
                        url: 'https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=MSFT&apikey=demo',
                        success: function(result) {
                            console.log(result, key, $priceCell);
                            if (result && result['Global Quote'] && result['Global Quote']['05. price']) {
                                $priceCell.text(result['Global Quote']['05. price']);
                            }
                        }
                    });
                },15000); //30s - the API has restriction of 5 calls/minute

            });
        }

        function refreshData() {
            $('.btn').click(function () {
                iterateTableRows();
                console.log('clicked');
            })
        }

    </script>
</head>
<body>

<!--Header-part-->
<div id="header">
    <h1><a href="dashboard.html">Matrix Admin</a></h1>
</div>
<!--close-Header-part-->


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
    </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
    <input type="text" placeholder="Search here..."/>
    <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="/" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li><a href="/"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li class="active"> <a href="/stock"><i class="icon icon-signal"></i> <span>Stock</span></a> </li>
        <li> <a href="/transaction"><i class="icon icon-inbox"></i> <span>Transaction</span></a> </li>
    </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->

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

<!--end-Footer-part-->

<script src="{{asset('js/excanvas.min.js')}}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery.ui.custom.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.flot.min.js')}}"></script>
<script src="{{asset('js/jquery.flot.resize.min.js')}}"></script>
<script src="{{asset('js/jquery.peity.min.js')}}"></script>
<script src="{{asset('js/fullcalendar.min.js')}}"></script>
<script src="{{asset('js/matrix.js')}}"></script>
<script src="{{asset('js/matrix.dashboard.js')}}"></script>
<script src="{{asset('js/jquery.gritter.min.js')}}"></script>
<script src="{{asset('js/matrix.interface.js')}}"></script>
<script src="{{asset('js/matrix.chat.js')}}"></script>
<script src="{{asset('js/jquery.validate.js')}}"></script>
<script src="{{asset('js/matrix.form_validation.js')}}"></script>
<script src="{{asset('js/jquery.wizard.js')}}"></script>
<script src="{{asset('js/jquery.uniform.js')}}"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
<script src="{{asset('js/matrix.popover.js')}}"></script>
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/matrix.tables.js')}}"></script>

<script type="text/javascript">
    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:
    function goPage (newURL) {

        // if url is empty, skip the menu dividers and reset the menu selection to default
        if (newURL != "") {

            // if url is "-", it is this page -- reset the menu:
            if (newURL == "-" ) {
                resetMenu();
            }
            // else, send page to designated URL
            else {
                document.location.href = newURL;
            }
        }
    }

    // resets the menu selection upon entry to this page:
    function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
    }
</script>
</body>
</html>
