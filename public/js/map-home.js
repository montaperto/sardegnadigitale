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
            var marker = createMarker(places[i]);
          }          
        }

        google.maps.event.addListener(map, "click", function(event) {
          infowindow.close();
        });

        flag = 1;
        map.fitBounds(bounds);

        var markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
  }

        // Adds a marker to the map and push to the array.
      function createMarker(place) {

          var location = new google.maps.LatLng(place.place_latitude, place.place_longitude)

          var icon = {
              url: '/img/icons/marker_1.png', // url
              scaledSize: new google.maps.Size(55, 55), // scaled size
          };

          var marker = new google.maps.Marker({
            position: location,
            map: map,
            icon: icon,
          });
          markers.push(marker);

          console.log(place.place_name);
          
          var contentString = "<div class='col-xs-12'>" +
          "<div class='thumbnail'>" +
            "<a href='/place/" + place.place_id + "'><img src='" + place.place_cover_img + "' alt='" + place.place_name + "'></a>" +
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
