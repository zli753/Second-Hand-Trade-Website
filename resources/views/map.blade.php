@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>View seller's location:</h3></header>
                    <div id="map">
                    <script type="text/javascript">
      				function initMap() {
        				var uluru = {lat: 38.646446, lng: -90.324329};
        				var map = new google.maps.Map(document.getElementById('map'), {
          					zoom: 15,
          					center: uluru
        				});
        				var geocoder = new google.maps.Geocoder();
        				var address = {!! json_encode($good_address) !!};
        				console.log(address);
        				geocoder.geocode({'address': address}, function(results, status) {
          				if (status === 'OK') {
            				map.setCenter(results[0].geometry.location);
            				var marker = new google.maps.Marker({
             				map: map,
              				position: results[0].geometry.location
            			});
          				} else {
            				alert('Geocode was not successful for the following reason: ' + status);
          				}
       				 });

      				}
    				</script>
    				<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyAseD9o4qF4wYf23PDV8KRfg28p-yaRg&callback=initMap">
    </script>
                    </div>
        </div>
    </section>
    <section class="row posts">
         <div style="text-align:center" class="col-md-6">
    <br><br><button type="button" class="btn btn-primary" ng-model="singleModel" onclick="location.href='{{route('mainboard')}}'">GO BACK</button>
    	</div>
    </section>
@endsection