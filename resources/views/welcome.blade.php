<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 user-scalable=no">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.js"></script>
</head>

<header role="banner" class="navbar navbar-fixed-top navbar-default">
    <div class="navbar-header">
      <a class="navbar-brand pull-left" href="index.html">Sardinia Wallet</a>
      <button data-toggle="collapse-side" data-target=".side-collapse" data-target-2=".side-collapse-container" type="button" class="navbar-toggle pull-right"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
    </div>
    <div class="navbar-default side-collapse in">
      <nav role="navigation" class="navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
        <li class="text-center"><img src="img/users/1.jpg" class="img-circle" alt="Andrea Montaperto" width="50"></li>
        <li><a href="profile.html"><span class="glyphicon glyphicon-user"></span> Andrea Montaperto</a></li>
        <li><a href="login.html"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
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
    </style>

</header>

<body>




<div class="container" style="padding-bottom: 50px;">  


<div class="row" style="padding-bottom: 20px;">
  <div class="col-xs-6">
    <select class="form-control">
      <option>Provincia</option>
      <option>Cagliari</option>
      <option>Medio Campidano</option>
      <option>Oristano</option>
      <option>Sassari</option>
      <option>Olbia-Tempio</option>
      <option>Nuoro</option>
      <option>Ogliatra</option>
      <option>Carbonia-Iglesias</option>
    </select>
  </div>
  <div class="col-xs-6">
    <select class="form-control">
      <option>Order by</option>
      <option>By rating</option>
      <option>Most visited</option>
      <option>Most favourited</option>
    </select>
  </div>
</div>




        <div class="col-xs-6 col-md-4 col-lg-3">
          <div class="thumbnail">
            <img src="img/places/1.jpg" alt="Cala Goloritze">
            <div class="caption">
              <h5>Cala Goloritzè</h5>
              <p>Beach</p>
              <p><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></p>
            </div>
          </div>
        </div>

        <div class="col-xs-6 col-md-4 col-lg-3">
          <div class="thumbnail">
            <a href="place.html"><img src="img/places/3.jpg" alt="Cala Coticcio"></a>
            <div class="caption">
              <h5>Cala Coticcio</h5>
              <p>Beach</p>
              <p><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></p>
            </div>
          </div>
        </div>

        <div class="col-xs-6 col-md-4 col-lg-3">
          <div class="thumbnail">
            <img src="img/places/4.jpg" alt="Stintino">
            <div class="caption">
              <h5>Stintino</h5>
              <p>Beach</p>
              <p><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></p>
            </div>
          </div>
        </div>

        <div class="col-xs-6 col-md-4 col-lg-3">
          <div class="thumbnail">
            <img src="img/places/1.jpg" alt="Cala Goloritze">
            <div class="caption">
              <h5>Cala Goloritzè</h5>
              <p>Beach</p>
              <p><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></p>
            </div>
          </div>
        </div>

        <div class="col-xs-6 col-md-4 col-lg-3">
          <div class="thumbnail">
            <a href="place.html"><img src="img/places/3.jpg" alt="Cala Coticcio"></a>
            <div class="caption">
              <h5>Cala Coticcio</h5>
              <p>Beach</p>
              <p><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></p>
            </div>
          </div>
        </div>

        <div class="col-xs-6 col-md-4 col-lg-3">
          <div class="thumbnail">
            <img src="img/places/4.jpg" alt="Stintino">
            <div class="caption">
              <h5>Stintino</h5>
              <p>Beach</p>
              <p><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></p>
            </div>
          </div>
        </div>


  </div>

  <div id="div-map" class="div-map" style="display:none;">
    <iframe
    width="100%"
    height="100%"
    frameborder="0" style="border:0"
    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBKdlgHP0S40CDTGqUFAPCEogL7MPpYf_E
      &q=Sardinia" allowfullscreen>
  </iframe>
  </div>

  <div class="footer navbar-fixed-bottom text-center" onclick="openMap();">
      <div class="alert alert-wallet fixed-bottom text-center" style="margin-bottom: 0px; color-background: black;" id="button-map" role="alert">Show Map <span class="glyphicon glyphicon-map-marker"></span></div>
  </div>
<!--
  <div class="footer navbar-bottom">
      <div class="panel-footer"><div class="text-center">© Andrea Montaperto - Developed by Andrea Montaperto</div></div>
  </div>
-->
</body>

<script>
  function openMap(){
    if(document.getElementById('div-map').style.display == "block"){
      document.getElementById('div-map').style.display = "none";
      document.getElementById('button-map').innerHTML = "Show map <span class='glyphicon glyphicon-map-marker'></span>";
    } else {
      document.getElementById('div-map').style.display = "block";
      document.getElementById('button-map').innerHTML = "Show results <span class='glyphicon glyphicon-th-list'></span>";
    }
  }
</script>


</html>























