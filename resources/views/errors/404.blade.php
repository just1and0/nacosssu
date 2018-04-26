<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>SDG PARL</title>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <!-- Bootstrap core CSS -->
    <link href=" {{ asset('css/bootstrap.min.css')}} " rel="stylesheet">
    <link href=" {{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style>
    .middle{
       padding:40px 15px;
    }

        
    @media (max-width:425px) {
        .middle{
            padding:0px 15px;
        }

    }
    </style>
</head>

<body>

<div class="container">
    <div class="row middle">
            <div class="col-xs-12 col-sm-6 col-lg-6 col-md-6 text-center">
                    <img src=" {{asset('storage/404.png')}} " style="display:inline;" alt="">
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-6 col-md-6 text-center middle" >
                <h1>OOPS!</h1>
                <hr>
                <h4 class="text-capitalize">It seems your Passcode has been used! and you will not be allowed to vote twice!</h4>
                <h4>You can visit our voting analysis page and see the poll as voting goes on. Thanks!</h4>
                <hr>
                <a href="/"><button class="btn btn-md btn-success">GO BACK TO HOMEPAGE</button></a>
                <a href="/"><button class="btn btn-md btn-success">Voting poll</button></a>
                
            </div>
    </div>
</div>




</body>
</html>