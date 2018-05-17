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

    </style>
</head>
<body>
<div class="row col-md-12">
    <div class="row col-md-12 col-mod-offset-2">
    <form id="product_code_comparison" name="product_code_comparison" method="GET" action="/api/food/commodities">
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">


            <div class="row col-md-3">
                <label class="col-md-offset-1">Product Variety</label>
                <div class="form-group">
                    <div class="col-lg-10 form-group">
                        <select class="form-control input-lg" name="product_variety" id="product_variety">

                        </select>
                    </div>
                </div>
            </div>
            <div class="row col-md-3">
                <label class="col-md-offset-1">Commodity Type</label>
                <div class="form-group">
                    <div class="col-lg-10 form-group">
                        <select class="form-control input-lg" name="commodity_type"
                                id="commodity_type">

                        </select>
                    </div>
                </div>
            </div>
            <div class="row col-md-3">
                <label class="">Year</label>
                <div class="form-group">
                    <div class="col-lg-10 form-group">
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
    <div id="chart-container">
        <canvas id="mycanvas"></canvas>
    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js"></script>
<script src="{{ URL::asset('js/data.js') }}"></script>

</body>
</html>