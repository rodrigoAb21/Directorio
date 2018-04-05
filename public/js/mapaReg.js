var map;
var marcador;

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: {lat: -17.7851016, lng: -63.1803851},
        mapTypeId: 'terrain'
    });

    map.addListener('click', function(event) {
        placeMarker(event.latLng);
    });
}


function placeMarker(location) {
    if ( marcador ) {
        marcador.setPosition(location);
    } else {
        marcador = new google.maps.Marker({
            position: location,
            map: map
        });
    }

    document.getElementById("long1").value = marcador.getPosition().lng();
    document.getElementById("lati1").value = marcador.getPosition().lat();
}