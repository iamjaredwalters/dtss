markerArr = [];  // dont hate me for the global :(

jQuery(document).ready(function($) {
  function apiCall() {
    // Get current artist for API query
    var artist = $('.artist-desc').attr('id');
    
    // http://api.bandsintown.com/artists/' . $a['artist'] . '/events.json?api_version=2.0&app_id=jww-child-theme

    $.getJSON("http://api.bandsintown.com/artists/" + artist + "/events.json?callback=?&app_id=jww-child-theme", function(result) {
      console.log(result);
      $.each(result, function(key, val) {
        console.log(key, val);
        var location = []
        var venue    = val.venue.city;
        var lat      = val.venue.latitude;
        var long     = val.venue.longitude;

        location.push(venue, lat, long);
        markerArr.push(location);
      });

      // Asynchronously Load the map API 
      var script = document.createElement('script');
      script.src = "http://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
      document.body.appendChild(script);
    });
  };

  
  apiCall();

});


function initialize() {
  var map;
  var bounds     = new google.maps.LatLngBounds();
  var mapOptions = {
      mapTypeId: 'roadmap'
  };
                  
  // Display a map
  map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
  map.setTilt(45);
    
  // Markers
  var markers = markerArr;
  
  // Loop through our array of markers & place each one on the map  
  for( i = 0; i < markers.length; i++ ) {
      var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
      bounds.extend(position);
      marker = new google.maps.Marker({
          position: position,
          map: map,
          title: markers[i][0]
      });

      // Automatically center the map fitting markers on the screen
      map.fitBounds(bounds);
  }
}



