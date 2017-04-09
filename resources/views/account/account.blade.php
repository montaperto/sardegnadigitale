@include('assets.header')

<div class="container">            

  <div class="row text-center">
      <img src="img/users/no_photo.png" class="img-circle" alt="Andrea Montaperto" width="150"> 
  </div>

  <div class="row text-center" style="margin-top: 20px;">
    <p><b>{{ $userInfo['name'] }}</b></p>
    <p><label class="btn btn-primary">Follow</label></p>
    <p><b>12</b> followers | <b>9</b> following</p>
    <p><b>21</b> places visited | <b>53</b> interests</p>
  </div>

  <div style="margin-top: 20px;">
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#home">Visited</a></li>
      <li><a data-toggle="tab" href="#menu1">Interests</a></li>
      <li><a data-toggle="tab" href="#menu2">Reviews</a></li>
    </ul>

    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <div style="padding-bottom: 20px"></div>
        
        @foreach($visits as $visit)
	        <div class="col-xs-6 col-md-4 col-lg-3">
	          <div class="thumbnail">
	            <a href="/place/{{ $visit->place_id }}"><img src="img/places/no_photo.jpg" alt="{{ $visit->place_name }}"></a>
	            <div class="caption">
	              <h5>{{ $visit->place_name }}</h5>
	              <p>*Type*</p>
	              <p><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star-empty"></span></p>
	            </div>
	          </div>
	        </div>
        @endforeach


      </div>
      <div id="menu1" class="tab-pane fade">
        <div style="padding-bottom: 20px"></div>
        
        @foreach($interests as $interest)
	        <div class="col-xs-6 col-md-4 col-lg-3">
	          <div class="thumbnail">
	            <a href="/place/{{ $interest->place_id }}"><img src="img/places/no_photo.jpg" alt="{{ $interest->place_name }}"></a>
	            <div class="caption">
	              <h5>{{ $interest->place_name }}</h5>
	              <p>*Type*</p>
	              <p><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star-empty"></span></p>
	            </div>
	          </div>
	        </div>
        @endforeach

      </div>
      <div id="menu2" class="tab-pane fade">
        <h3>Reviews</h3>
        <p></p>
      </div>
    </div>
  </div>
</div>

@include('assets.footer')