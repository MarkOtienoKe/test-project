<!-- index.blade.php -->

<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Test</title>

    <!-- Fonts -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/css/bootstrap-select.min.css">
    <style>
        .loading {
            background-color: #ffffff;
            background-image: url("http://loadinggif.com/images/image-selection/3.gif");
            background-size: 25px 25px;
            background-position: right center;
            background-repeat: no-repeat;
        }

    </style>
</head>
<body>
<div class="col-md-12">
    <div>
        <br>
    </div>
    <div class="row col-md-12" id="" style="">
    <form id="" name="" method="GET" action="/sales/data">

            <div class="col-md-3">
                <label class="">Product Variety</label>
                <div class="form-group">
                    <div class="form-group">
                        <select class="form-control input-lg" name="product_variety" id="product_variety" required>

                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <label class="">Commodity Type</label>
                <div class="form-group">
                    <div class="form-group">
                        <select class="form-control input-lg" name="commodity_type"
                                id="commodity_type" required>

                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <label class="">Year</label>
                <div class="form-group">
                    <div class="form-group">
                        <select class="form-control input-lg" name="year" id="year">
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                        </select>
                    </div>
                </div>
            </div>



        <div class="col-md-3">
            <div class="form-group">
                <div class="form-group">
                    <button type="submit" id="submitCodeButton"
                            class="btn btn-primary col-lg-8 input-lg compareVersionBtn">Submit
                    </button>
                </div>
            </div>
        </div>

    </form>
    </div>

    <div id="chart-container" class="col-md-12" style="border: solid 1px green">
        <h3 class="text-center">{{$pageData['title']}} For {{$pageData['commodity']}} in {{$pageData['year']}}</h3>
        <canvas id="mycanvas"></canvas>
        <p class="pull-right">Months</p>
    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js"></script>
<script src="{{ URL::asset('js/data.js') }}"></script>
<script>
  $(document).ready(function(){
    plotSalesMonthlyGraph({!! $graphData!!});

  });
</script>
</body>
</html>