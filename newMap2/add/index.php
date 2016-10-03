<?php 	
	define('ROOT_PATH', dirname(dirname(__FILE__)));

	require(ROOT_PATH . '/parts/header.php');
?>

	<div id="map" style="height: 300px"></div>
  
  <form action="save.php" method="POST" class="container pv-50 mw-500">

  	<div class="form-group">
  		<label>Lat:</label>
  		<input id="latitude" class="form-control" type="text" name="lat" placeholder="xx.xxxxx" required>
  	</div>
  	<div class="form-group">
  		<label>Lng:</label>
  		<input id="longitude" class="form-control" type="text" name="lng" placeholder="xx.xxxxx" required>
  	</div>
  	<div class="form-group">
  		<label>Address:</label>
  		<input id="address" class="form-control" type="text" name="address" placeholder="..." required>
  	</div>
  	<div class="form-group">
  		<label>Description:</label>
  		<textarea rows="3" class="form-control" type="text" name="description" placeholder="Enter description ..." required></textarea>
  	</div>
  	<div class="form-group">
  		<label>Name:</label>
  		<input class="form-control" type="text" name="name" placeholder="Enter place name" required>
  	</div>
  	<div class="form-group">
  		<label>Contact email:</label>
  		<input class="form-control" type="email" name="email" placeholder="Enter contact email" required>
  	</div>
  	<div class="form-group">
  		<label>Contact phone:</label>
  		<input class="form-control" type="text" name="phone" placeholder="Enter contact phone" required>
  	</div>

  	<button type="submit" name="submit" class="btn btn-primary">Create</button>

  </form>


	<script type="text/javascript">
		var map;
		var marker;
		function initMap()
		{
			map = new google.maps.Map(document.getElementById('map'), {
				center: {lat: 49.839741, lng: 24.036005},
				zoom: 17
			});

			map.addListener('click', function(e)
			{	
				var latitude = e.latLng.lat();
				var longitude = e.latLng.lng();

				myLatlng = {lat: latitude, lng: longitude};

				if(marker)
				{
					marker.setMap(null);
				}

				marker = new google.maps.Marker({
				    position: myLatlng,
				    title:""
				});
				marker.setMap(map);

				document.getElementById('latitude').value = latitude;
				document.getElementById('longitude').value = longitude;

				var geocoder = new google.maps.Geocoder;

				geocoder.geocode({'location': {lat: latitude, lng: longitude}}, function(results, status)
				{
					document.getElementById('address').value = results[0].formatted_address;
				});
			});
		}
	</script>

	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAt4jkC4exGHcsdPEoDtGfk-6iGVEzryr8&callback=initMap"></script>
<?php

	
	require(ROOT_PATH . '/parts/footer.php');