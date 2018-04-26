<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NACOSS</title>

   <link href="{{asset('css/app.css')}}" rel="stylesheet">
   <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
   <link href="{{asset('css/vote.css')}}" rel="stylesheet">
 

</head>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">NACOSS</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">ABOUT <span class="sr-only">(current)</span></a></li>
        <li><a href="#">EVENT</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">CONTACT <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">CONTACT</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">SOCIALS HERE</a></li>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



<div class="container">
    <div class="row hidden-md hidden-lg">
          <div class="col-xs-12 text-center">
                        <h1>VOTING</h1>
                        <h2>RULES</h2>
                        <br>
                        <p class="text-justify"> 
                         <LI>Do not exit the brower until you're sure you're done voting</LI>
                        <li>Do not try to use your passcode twice it wont work</li>
                        <li>Once election is over and you havent used your passcode. it'd be invalid</li>
                    
                        </p>

                  </div>
    
    </div>
    <div class="row hold-banner">
            <div class="col-xs-8  hidden-xs hidden-sm text-center">
            <h1>VOTING RULES</h1>
            <!-- <h2>RULES</h2> -->
                  <br>
                  <p class="text-left"> 
                  <LI>Do not exit the brower until you're sure you're done voting</LI>
                 <li>Do not try to use your passcode twice it wont work</li>
                 <li>Once election is over and you havent used your passcode. it'd be invalid</li>
               <!-- <li>Be sure to click the "DONE VOTING" button once you're done voting</li> -->
                
                 </p>

            </div>
            <div class="col-xs-12 col-sm-12  col-md-4 col-lg-4">
                <div class="col-xs-12">

                  <div class="text-center form">
             
               @foreach($id as $i)
                        <a href="/start/{{$i->code}}"> 
                  
               @endforeach  
                    <button class="btn btn-lg btn-danger"> 
                        START
                        <br>
                        VOTING
                    </button>
               </a>
                  </div>
                </div>
            </div>
    </div>
</div>

   
    </body>
</html>
