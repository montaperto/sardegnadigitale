@include('assets.header')
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
            <a href="place/{{ $place->place_id }}"><img src="img/places/no_photo.jpg" alt="{{ $place->place_name }}"></a>
            <div class="caption">
              <h5>{{ $place->place_name }}</h5>
              <p>Beach</p>
              <font size="1px">
              <p><input style="font-size: 0px" id="input-4" name="input-4" class="rating rating-loading" data-show-clear="false" data-show-caption="false" value="4.5" data-size="xs"></p>
              </font>
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

</body>

<script type="text/javascript">
    var map;
    var markers = [];
    var places = @php echo json_encode($places); @endphp;
    var infowindow;
    var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var flag = 0;
    var locations = new Array();
</script>

<script src="js/map-home.js"></script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKdlgHP0S40CDTGqUFAPCEogL7MPpYf_E&callback=initMap">
</script>

</html>























