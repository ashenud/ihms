//map...............................
function initMap() {
    
    var map = new google.maps.Map(document.getElementById('map'), {
        center: new google.maps.LatLng(7.433, 80.241),
        zoom: 12
    });
    var infoWindow = new google.maps.InfoWindow;   
    
    
    //getting current location on the map
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                var marker2 = new google.maps.Marker({
                    map: map,
                    position: pos,
                    animation: google.maps.Animation.BOUNCE


                });

                marker2.addListener('click', function () {
                    infoWindow.setContent("ඔබ සිටින්නේ මෙතනයි");
                    infoWindow.open(map, marker2);

                });

                map.setCenter(pos);

            },
            function () {
                handleLocationError(true, infoWindow, map.getCenter());
            });
    } 
    else {
        // if Browser doesn't support Geolocation.
        handleLocationError(false, infoWindow, map.getCenter());
    }
    
    
    var add_marker = null
    
    // first time map load set marker static
    add_marker = new google.maps.Marker({
        map: map,
        position: new google.maps.LatLng(11.342423, 77.728165),
        zoom: 12
    });
    
    map.addListener("click", function (e) {
        if (add_marker != null) { //already set marker to clear
            add_marker.setMap(null);
            add_marker = null;
        }

        // Dynamic to set marker based on click event
        let icon = {
            url: '../../img/midwife/home-map.png',
            scaledSize: {
                width: 26,
                height: 43,
            }
        }
        
        add_marker = new google.maps.Marker({
            map: map,
            position: new google.maps.LatLng(e.latLng.lat(), e.latLng.lng()),
            zoom: 12,
            icon: icon,
        });
    });
    
    
    // add a click event handler to the map object
    google.maps.event.addListener(map, 'click', function (event) {
        // display the lat/lng in your form's lat/lng fields
        document.getElementById("latInput").value = event.latLng.lat()
        document.getElementById("longInput").value = event.latLng.lng()
    });

    
    // Browser doesn't support Geolocation function
    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
    };

    // dounloadUrl function
    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function () {
            if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);
    }
}

function doNothing() {}