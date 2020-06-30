(function($) {
    'use strict';

initMap();
function initMap() {

    var coords = $('#map_coordinates').val(),
        coords_split = coords.split(',');

    if( $('#map_coordinates').val() !== '' ) {
        var latitude = coords_split[0],
            longitude = coords_split[1];
    }
    else {
        var latitude = 40.7127837,
            longitude = -74.0059413;
    }

    var map = new google.maps.Map(document.getElementById('post-map'), {
        zoom: 8,
        scrollwheel: false,
        center: {
            lat: parseFloat(latitude),
            lng: parseFloat(longitude)
        }
    });
    
    var marker;
    marker = new google.maps.Marker( {
        position : new google.maps.LatLng(
            parseFloat(latitude), 
            parseFloat(longitude)
        ),
        map: map
    });

    var geocoder = new google.maps.Geocoder();

    document.getElementById('search-map').addEventListener('click', function(event) {
        event.preventDefault();
        geocodeAddress(geocoder, map);
    });

}

function geocodeAddress(geocoder, resultsMap) {

    var address = document.getElementById('search-location').value;
    geocoder.geocode({'address': address}, function(results, status) {

    if (status === google.maps.GeocoderStatus.OK) {

        resultsMap.setCenter(results[0].geometry.location);

        $('#map_coordinates').val(results[0].geometry.location.lat() + ', ' + results[0].geometry.location.lng());

        var marker = new google.maps.Marker({
            map: resultsMap,
            position: results[0].geometry.location
        });

    }
    else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
    });

}
    
})(jQuery);