@include('assets.header')

<div class="row" style="padding-bottom: 20px; padding-top: 60px; background-color: WHITESMOKE;">

  <div class="col-xs-12 col-lg-3" style="padding-top: 10px;">
    <!-- ajax call with autocomplete -->
    <input type="text" class="form-control" placeholder="City">
  </div>
  
  <div class="col-xs-12 col-lg-3" style="padding-top: 10px;">
    <!-- trigger -->
    <label for="points">Radius:</label> <label id="radius"></label>
    <input type="range" id="myRange" value="300" min="0" max="400" oninput="showSliderValue();" onchange="showSliderValue();">
  </div>

  <div class="col-xs-5 col-lg-2" style="padding-top: 10px;">
    <select class="form-control">
      <option>Category</option>
      <option>Beach</option>
      <option>Trekking</option>
      <option>City</option>
      <option>Museum</option>
      <option>Shops</option>
    </select>
  </div>

  <div class="col-xs-5 col-lg-2" style="padding-top: 10px;">
    <select class="form-control">
      <option>Order by</option>
      <option>By rating</option>
      <option>Most visited</option>
      <option>Most favourited</option>
    </select>
  </div>

  <div class="col-xs-2 col-lg-2" style="padding-top: 10px;">
    <label class="btn btn-primary form-control"><span class="glyphicon glyphicon-search"></span></label>
  </div>

</div>


<div class="container" style="padding-top: 20px;"> 

  @foreach($places as $place)
        <div class="col-xs-6 col-md-4 col-lg-3">
          <div class="thumbnail">
            <a href="place/{{ $place->place_id }}"><img src="{{ $place->place_cover_img }}" alt="{{ $place->place_name }}" width="100%"></a>
            <div class="caption">
              <h5>{{ $place->place_name }}</h5>
              <p>Beach</p>

              <p><input id="input-4" name="input-4" class="rating rating-loading" data-show-clear="false" data-show-caption="false" value="{{ $place->place_rating }}" data-size="xs"></p>

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


    $('.rating-loading').rating({displayOnly: true, step: 0.5});

</script>

<script src="js/map-home.js"></script>

<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKdlgHP0S40CDTGqUFAPCEogL7MPpYf_E&callback=initMap">
</script>
<script type="text/javascript">
function showSliderValue(){
  document.getElementById("radius").innerHTML = ' ' + document.getElementById("myRange").value + ' km';
}
showSliderValue();
</script>

</html>