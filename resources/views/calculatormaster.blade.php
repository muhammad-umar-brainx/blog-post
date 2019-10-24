<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <meta name="theme-color" content="#fafafa">
</head>

<body>
<!--[if IE]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Add your site or application content here -->


<section class="container jumbotron">
    <form action="{{ action('PracticeController@calculator') }}" method="POST" class="was-validated form-inline text-center">
        {{csrf_field()}}


        <div class="form-group">
            <label for="firstNumber">First Number:</label>
            <input type="number" value="{{isset($firstNumber)?$firstNumber:''}}" class="form-control" id="firstNumber"  placeholder="First number" name="firstNumber" required>
        </div>
        <div class="form-group">
            <label for="secondNumber">Second Number:</label>
            <input type="number" value="{{isset($secondNumber)?$secondNumber:''}}" class="form-control" id="secondNumber" placeholder="Second number" name="secondNumber" required>
        </div>
        <div class="form-group form-check">
                <label for="operator">Operator</label>
                <select class="form-control" id="operator" name="operator">
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="*">*</option>
                    <option value="/">/</option>
                </select>
        </div>
        <div class="">
            <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
        </div>
    </form>
    @if(isset($result))
    <label class="">Answer : {{$result}}</label>
@endif
</section>

<div class="container text-center">
    <h1 class="text-center">AJAX Practice</h1>
    <div class="">
        <input type="text" placeholder="url here" id="urlinput" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
    </div>
    <p id="para">Incoming data will display here</p>
    <button id="sendBtn">Submit</button>
</div>

<div class="form-group">
    <label for="mySelect">Select list (select one):</label>
    <select class="form-control" id="mySelect">
        <option value="GET">GET</option>
        <option value="POST">POST</option>
        <option value="PUT">PUT</option>
        <option value="DELETE">DELETE</option>
    </select>
</div>
<p id="pselected"></p>

<script src="js/vendor/modernizr-3.7.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async></script>
<script src="{{URL::asset('js/calculator.js')}}"></script>
</body>

</html>
