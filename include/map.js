var map;
var geocoder;
//startup map
function initialize(){
	var map_canvas = document.getElementById('map-canvas');
	var map_options= {
		center: new google.maps.LatLng(40.69847032, -73.95144224),
		zoom: 7,
		maxZoom: 12,
		minZoom: 5,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map(map_canvas, map_options);
	geoLocate();
}

/*I know where you live*/
function geoLocate(){
	if(navigator.geolocation){
		browserSupportFlag = true;
		navigator.geolocation.getCurrentPosition(function(position){
			initialLocation = new google.maps.LatLng(position.coords.latitude,
				position.coords.longitude);
			map.setCenter(initialLocation);
			}, function(){
				handleNoGeolocation(browserSupportFlag);
		});
	}
	else{
		browserSupportFlag = false;
		handleNoGeolocation(browserSupportFlag);
	}

	upCords(40.69847032, -73.95144224);
	readJSON();
}

/*handles Stalker errors*/
function handleNoGeolocation(error){
	if(error == true){
		alert("Geolocation service not available.");
	}
	else{
		alert("Browser doesn't support geolocation, consider switching.");
	}

	/*Set default location to NYC*/
	map.setCenter(new google.maps.LatLng(40.69847032, -73.95144224));
}

/*convert addresses to LongLat and store in file*/
function convertTOLongLat(){
	geocoder = new google.maps.Geocoder();
}

/*Upload coordinates to map*/
function upCords(lat, long){

	var location = new google.maps.LatLng(lat, long);
	var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
	var marker = new google.maps.Marker(
	{
		map:map,
		position:location,
		title:"Hello!",
		icon: iconBase + 'schools_maps.png',
		shadown: iconBase+ 'schools_maps.shadow.png'
	});
	marker.setMap(map);
}

function getCord(){
	geocoder = new google.maps.Geocoder();
	var address = 'New York, NY';
	geocoder.geocode({'address':address}, 
		function(results, status){
			if(status == google.maps.GeocoderStatus.OK){
				map.setCenter(results[0].geometry.location);
				var marker = new google.maps.Marker(
				{
					map:map,
					position:results[0].geometry.location
				});
			}
			else{
				alert("Geocde not working because of: " + status);
			}
		});
	alert("The End");
}

//get data from File
function getData(){
	var xhr = new XMLHttpRequest();
	xhr.open('GET', '', true);
	xhr.onload = function(){
		loadLocals(this.responseText);
	}
}

google.maps.event.addDomListener(window, 'load', initialize);