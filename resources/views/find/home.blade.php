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
      initMap();
      document.getElementById('button-map').innerHTML = "Show results <span class='glyphicon glyphicon-th-list'></span>";
    }
  }

  var map;
  var markers = [];
  var places = @php echo json_encode($places); @endphp;
  var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  var flag = 0;
  console.log(places);

  var locations = new Array();

  function initMap() {

        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 3,
          center: {lat: -28.024, lng: 140.887}
        });

        var bounds = new google.maps.LatLngBounds();

        for(var i=0; i<places.length; i++) {
          locations[locations.length] = new google.maps.LatLng(places[i].place_latitude, places[i].place_longitude);
          bounds.extend(new google.maps.LatLng(places[i].place_latitude, places[i].place_longitude));

          if(flag == 0){
            var marker = createMarker(i, places[i]);
          }
          
          
          //markers[markers.length] = marker;
        }

        flag = 1;


        /*
        markers = locations.map(function(location, i) {
          return new google.maps.Marker({
            position: location,
            label: labels[i % labels.length]
          });
        });
  */
        map.fitBounds(bounds);

        var markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});


  }




        // Adds a marker to the map and push to the array.
      function createMarker(i, place) {

          var location = new google.maps.LatLng(place.place_latitude, place.place_longitude)

          var marker = new google.maps.Marker({
            position: location,
            map: map,
            label: labels[i % labels.length]
          });
          markers.push(marker);
          
          var contentString = "<div class='col-xs-12'>" +
          "<div class='thumbnail'>" +
            "<img src='img/places/no_photo.jpg' alt='" + place.place_name + "'>" +
            "<div class='caption'>" +
              "<h5> " + place.place_name + " </h5>" +
              "<p>Beach</p>" +
              "<p><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span><span class='glyphicon glyphicon-star'></span></p>" +
            "</div>" +
          "</div>" +
        "</div>";

          var infowindow = new google.maps.InfoWindow({
            content: contentString,
            maxWidth: 200,
            maxHeight: 200,
            paddingRight: 0,
          });
          marker.addListener('click', function() {
            infowindow.open(map, marker);
          });
      }


</script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKdlgHP0S40CDTGqUFAPCEogL7MPpYf_E&callback=initMap">
</script>




</html>























