var map;

//When Called, the function initializes the Google Map
function initialize() {
    var map_canvas = document.getElementById('map-canvas');
    var map_options= {
        center: new google.maps.LatLng(40.69847032, -73.95144224),
        zoom: 7,
        maxZoom: 15,
        minZoom: 5,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(map_canvas, map_options);
    readJSON();
    geoLocate();
}
//When the HTML page has been fully loaded, this method will call the Initialize() method
google.maps.event.addDomListener(window, 'load', initialize);

/*Center on users location if permitted*/
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
}

/*handles User Location errors*/
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

/*Upload coordinates to google map, the parameters are passed through from the method in fileOps.js
They are contained in the json files from Crunch Base*/
function upCords(lat, long, title){

    var location = new google.maps.LatLng(lat, long);
    var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
    var marker = new google.maps.Marker(
    {
        map:map,
        position:location,
        title:title
    });

    var infowindow = new google.maps.InfoWindow({
      content: 'title'
    });

    makeInfoWindowEvent(infowindow, marker);
    marker.setMap(map);
}

/*If the user Clicks on a company marker, a pop-up window will be displayed*/
function makeInfoWindowEvent(infowindow, marker){
      google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map, marker);
    });
}
/*takes String address and convers to coordinates*/
function convertCord(){
    var geocoder = new google.maps.Geocoder();
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