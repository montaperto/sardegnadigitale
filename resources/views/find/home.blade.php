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
      <a href="index.html"><img src="img/icons/shardana.png" height="50px" style="padding-top: -20px"></a>
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

  @foreach($places as $place)
        <div class="col-xs-6 col-md-4 col-lg-3">
          <div class="thumbnail">
            <img src="img/places/no_photo.jpg" alt="Cala Goloritze">
            <div class="caption">
              <h5>{{ $place->place_name }}</h5>
              <p>Beach</p>
              <p><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></p>
            </div>
          </div>
        </div>
  @endforeach


  </div>

  <div id="div-map" class="div-map" style="display:none;">
    <div id="map"></div>
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
      document.getElementById('map').style.height = '100%';
      document.getElementById('map').style.width = '100%';
      document.getElementById("map").style.zIndex = "10000";
      //initMap();
      initialize();
      document.getElementById('button-map').innerHTML = "Show results <span class='glyphicon glyphicon-th-list'></span>";
    }
  }

  function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 3,
          center: {lat: -28.024, lng: 140.887}
        });

        for(var i=0; i<places.length; i++) {
        //locations[locations.length].lat = places[i].place_latitude;
        //locations[locations.length].lng = places[i].place_longitude;

        locations[locations.length] = new google.maps.LatLng(places[i].place_latitude, places[i].place_longitude);
      }

        // Create an array of alphabetical characters used to label the markers.
        var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // Add some markers to the map.
        // Note: The code uses the JavaScript Array.prototype.map() method to
        // create an array of markers based on a given "locations" array.
        // The map() method here has nothing to do with the Google Maps API.
        var markers = locations.map(function(location, i) {
          return new google.maps.Marker({
            position: location,
            label: labels[i % labels.length]
          });
        });

        // Add a marker clusterer to manage the markers.
        var markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
      }


      var places = @php echo json_encode($places); @endphp;

      console.log(places);

      var locations = new Array();

      

      /*
      var locations = [
        {lat: -31.563910, lng: 147.154312},
        {lat: -33.718234, lng: 150.363181},
        {lat: -33.727111, lng: 150.371124},
        {lat: -33.848588, lng: 151.209834},
        {lat: -33.851702, lng: 151.216968},
        {lat: -34.671264, lng: 150.863657},
        {lat: -35.304724, lng: 148.662905},
        {lat: -36.817685, lng: 175.699196},
        {lat: -36.828611, lng: 175.790222},
        {lat: -37.750000, lng: 145.116667},
        {lat: -37.759859, lng: 145.128708},
        {lat: -37.765015, lng: 145.133858},
        {lat: -37.770104, lng: 145.143299},
        {lat: -37.773700, lng: 145.145187},
        {lat: -37.774785, lng: 145.137978},
        {lat: -37.819616, lng: 144.968119},
        {lat: -38.330766, lng: 144.695692},
        {lat: -39.927193, lng: 175.053218},
        {lat: -41.330162, lng: 174.865694},
        {lat: -42.734358, lng: 147.439506},
        {lat: -42.734358, lng: 147.501315},
        {lat: -42.735258, lng: 147.438000},
        {lat: -43.999792, lng: 170.463352}
      ];*/

             function initialize() {





  var map = new google.maps.Map(
    document.getElementById("map"), {
      center: new google.maps.LatLng(37.4419, -122.1419),
      zoom: 13,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
  var bounds = new google.maps.LatLngBounds();
  



  for (i = 0; i < locations.length; i++) {
    var marker = new google.maps.Marker({
      position: locations[i],
      map: map
    });
    bounds.extend(new google.maps.LatLng(locations[i].lat, locations[i].lng));
  }
  map.fitBounds(bounds);
}
google.maps.event.addDomListener(window, "load", initialize);
</script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKdlgHP0S40CDTGqUFAPCEogL7MPpYf_E&callback=initMap">
</script>




</html>























