var customLabel = {
    mother: {
        label: 'House'
    },
    midwife: {
        label: 'Staff'
    }
};



//map

function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: new google.maps.LatLng(7.433, 80.241),
        zoom: 12
    });
    var infoWindow = new google.maps.InfoWindow;

    // including locations in database to the map
    downloadUrl('/pages/midwife/php/location-add-action.php', function (data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName('locations');
        Array.prototype.forEach.call(markers, function (markerElem) {
                var id = markerElem.getAttribute('mother_nic');
                var name = markerElem.getAttribute('name');
                var address = markerElem.getAttribute('address');
                var type = markerElem.getAttribute('status');
                var point = new google.maps.LatLng(
                    parseFloat(markerElem.getAttribute('lat')),
                    parseFloat(markerElem.getAttribute('lng')));

                var infowincontent = document.createElement('div');
                var strong = document.createElement('strong');
                strong.textContent = name
                infowincontent.appendChild(strong);
                infowincontent.appendChild(document.createElement('br'));

                var text = document.createElement('text');
                text.textContent = address
                infowincontent.appendChild(text);
                let icon = {
                    url: '/pages/midwife/img/home-map.png',
                    scaledSize: {
                        width: 26,
                        height: 43,
                    }
                }

                var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    icon: icon,
                });
                marker.addListener('click', function () {
                    infoWindow.setContent(infowincontent);
                    infoWindow.open(map, marker);

                });


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
                } else {
                    // if Browser doesn't support Geolocation
                    handleLocationError(false, infoWindow, map.getCenter());
                }
            },

            function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                infoWindow.setPosition(pos);
                infoWindow.setContent(browserHasGeolocation ?
                    'Error: The Geolocation service failed.' :
                    'Error: Your browser doesn\'t support geolocation.');
            });
    });
}



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

function doNothing() {}