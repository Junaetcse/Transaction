<!DOCTYPE html>
<html lang="en">
<head>
    <title>Stock Price</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/fullcalendar.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/jquery.gritter.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
    <h1><a href="/">Matrix Admin</a></h1>
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
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li class="active"><a href="/"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li> <a href="/stock"><i class="icon icon-signal"></i> <span>Stock</span></a> </li>
        <li> <a href="/add-stock"><i class="icon icon-inbox"></i> <span>Add Stock</span></a> </li>

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
                    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                        <h5>Stock table</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ticket</th>
                                <th>current_price</th>
                                <th>average_price</th>
                                <th>stock</th>
                                <th>action</th>

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

<!--end-Footer-part-->

<script src="js/excanvas.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.ui.custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.flot.min.js"></script>
<script src="js/jquery.flot.resize.min.js"></script>
<script src="js/jquery.peity.min.js"></script>
<script src="js/fullcalendar.min.js"></script>
<script src="js/matrix.js"></script>
<script src="js/matrix.dashboard.js"></script>
<script src="js/jquery.gritter.min.js"></script>
<script src="js/matrix.interface.js"></script>
<script src="js/matrix.chat.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/matrix.form_validation.js"></script>
<script src="js/jquery.wizard.js"></script>
<script src="js/jquery.uniform.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/matrix.popover.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/matrix.tables.js"></script>

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
