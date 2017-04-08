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
      <a href="/places"><img src="../img/icons/shardana.png" height="50px" style="padding-top: -20px"></a>
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
  </header>

  <body>



    <div >
      <!--<img src="../img/places/no_photo.jpg" style="padding-top: 50px;" alt="cover" width="100%">-->
    </div>
    <div class="container">            

      <div class="row text-center">
        <label class="btn btn-primary" data-toggle="modal" data-target="#markAsVisitedModal">Mark as visited</label>
        <label class="btn btn-primary">Mark as interesting</label>
        <h2>{{ $place->place_name }}</h2>
        <p>
          <input id="input-4" name="input-4" class="rating rating-loading" data-show-clear="false" data-show-caption="false">
        </p>
        <p>

          <b>20</b> users have visited this place<br>
          <b>72</b> users are interested about it
        </p>
      </div>

      <div class="row">
        <div class="col-xs-12 col-md-6">
          <b>Type:</b> Beach<br>
          <b>Reachable by car:</b> No (20 min by feet)<br>
          <b>Services:</b> No
        </div>
        <div class="col-xs-12 col-md-6">
        </div>
      </div>

      <div style="margin-top: 20px;">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#home">Instagram</a></li>
          <li><a data-toggle="tab" href="#menu1">Reviews <span class="badge">2</span></a></li>
          <li><a data-toggle="tab" href="#menu2">Map</a></li>
          <li><a data-toggle="tab" href="#menu3">Video</a></li>
        </ul>

        <div class="tab-content">
          <div id="home" class="tab-pane fade in active">
            <div style="padding-bottom: 20px"></div>

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
                <img src="img/places/3.jpg" alt="Cala Coticcio">
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
          <div id="menu1" class="tab-pane fade">
            <div style="padding-bottom: 20px"></div>

            <div class="alert alert-warning" role="alert">
              <div class="row" style="padding: 10px;">
                <div class="pull-left" style="padding-right:20px;">
                  <a href="profile.html"><img src="img/users/1.jpg" class="img-circle" alt="Andrea Montaperto" width="50"></a>
                </div>
                <div class="pull-left">
                  <p><a href="profile.html"><b>Andrea Montaperto</b></a> <i>24/02/2016</i></p>
                  <p><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></p></p>
                </div>
              </div>
              <div class="row" style="padding: 10px;">
                <p>Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
            </div>
            <div class="alert alert-warning" role="alert">
              <div class="row" style="padding: 10px;">
                <div class="pull-left" style="padding-right:20px;">
                  <img src="img/users/2.jpg" class="img-circle" alt="Simone Garau" width="50">
                </div>
                <div class="pull-left">
                  <p><b>Simone Garau</b> <i>01/02/2016</i></p>
                  <p><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star-empty"></span></p></p>
                </div>
              </div>
              <div class="row" style="padding: 10px;">
                <p>Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>

            </div>

          </div>
          <div id="menu2" class="tab-pane fade">
            <div style="padding-bottom: 20px"></div>
            <h3>Map</h3>
          </div>
          <div id="menu3" class="tab-pane fade">
            <div style="padding-bottom: 20px"></div>
            <div class="col-md-3 col-xs-0"></div>
            <div class="col-md-6 col-xs-12 text-center" style="padding-bottom:50px;">
              <iframe width="100%" height="315" src="https://www.youtube.com/embed/RibR-0ihki8" frameborder="0" allowfullscreen></iframe>
            </div>

          </div>
        </div>
      </div>








        <!-- Modal -->
        <div class="modal fade" id="markAsVisitedModal" role="dialog">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">When did you visit it?</h4>
              </div>
              <div class="modal-body text-center">
                <label class="btn btn-success">Before</label>
                <label class="btn btn-success">2015</label>
                <label class="btn btn-success">2016</label>
                <label class="btn btn-success">2017</label>
              </div>
            </div>
          </div>
        </div>




    </div>


    <div class="footer navbar-bottom">
      <div class="panel-footer"><div class="text-center">© Andrea Montaperto - Developed by Andrea Montaperto</div></div>
    </div>
  </body>

  </html>




















