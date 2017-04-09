<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 user-scalable=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../bootstrap/css/star-rating.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="../bootstrap/js/star-rating.min.js"></script>
</head>

<header role="banner" class="navbar navbar-fixed-top navbar-default">
    <div class="navbar-header">
      <a href="/"><img src="../img/icons/shardana.png" height="50px" style="padding-top: -20px"></a>
      <button data-toggle="collapse-side" data-target=".side-collapse" data-target-2=".side-collapse-container" type="button" class="navbar-toggle pull-right"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
    </div>
    <div class="navbar-default side-collapse in">
      <nav role="navigation" class="navbar-collapse">
        <ul class="nav navbar-nav navbar-right">

        @if (Auth::guest())
          <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-out"></span> Login</a></li>
        @else
          <li class="text-center"><img src="../img/users/1.jpg" class="img-circle" alt="{{ Auth::user()->name }}" width="50"></li>
          <li><a href="/profile"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }}</a></li>
          <li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        @endif
        <li style="padding-right:20px;"></li>
      </ul>
      </nav>
    </div>

    <style>
      #div-map {
          min-height: 100%; 
          z-index: 1000;
          position: fixed; 
          top:0; 
          left:0; 
          width:100%; 
          height:100%;
          padding-top: 50px;
          padding-bottom: 50px;
      }
      .wrapper{min-height:100%; position:relative}

      .container{padding-bottom: 50px;}
    </style>
</header>

<body>