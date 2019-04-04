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
    <script type="text/javascript">
        var timeouts = [];
        $(document).ready(function() {

            $('.add-stock').click(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                var $row =  $(this).closest("tr");
                var $symbol = $row.find(".data-symbol").data('symbol');
                var $name = $row.find(".data-name").data('name');
                console.log($symbol);
                console.log($name);
                addStock($symbol,$name)
            })

            function addStock($symbol,$name) {
                if($symbol != '' && $name != '' ){
                    $.ajax({
                        type: 'post',
                        url: 'insert-stock',
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'ticket': $symbol,
                            'name': $name},
                        success: function(data) {
                            alert('successfully added')
                        },
                        error:'Something wrong'
                    });
                }
            }

            iterateTableRows();
            // var length =  $(".parent tr").length;
            //setInterval(iterateTableRows, 12000*length+30000); //5s
            refreshData()
        })





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
