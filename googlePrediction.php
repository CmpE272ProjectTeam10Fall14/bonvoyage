<?php
error_reporting(0);
?>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>

<script>
    var map;
    var infowindow;
    function initialize() {
        var pyrmont = new google.maps.LatLng( <?php echo $lat;?>, <?php echo $lon;?>);

        map = new google.maps.Map(document.getElementById('map-canvas'), {
            center: pyrmont,
            zoom: 12
        });

        var marker=new google.maps.Marker({
            position:pyrmont
        });
        marker.setMap(map);

        var request = {
            location: pyrmont,
            radius: 16000,
            types: ['art_gallery','amusement_park','church','place_of_worship','park','museum','lodging','restaurant','shopping_mall','zoo','aquarium','airport']
        };
        infowindow = new google.maps.InfoWindow();
        var service = new google.maps.places.PlacesService(map);
        service.nearbySearch(request, callback);
    }

    function callback(results, status) {
        if (status == google.maps.places.PlacesServiceStatus.OK) {
            for (var i = 0; i < results.length; i++) {
                createMarker(results[i]);
            }
        }
    }

    function createMarker(place) {
        var placeLoc = place.geometry.location;
        var marker = new google.maps.Marker({
            map: map,
            position: place.geometry.location
        });

        google.maps.event.addListener(marker, 'click', function() {
            infowindow.setContent(place.name);
            infowindow.open(map, this);
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<div id="map-canvas" style="width:700px;height:400px;"></div>
