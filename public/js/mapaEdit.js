var map, map2;
var marcador, marcador2;

var l1 = parseFloat(document.getElementById("latitud2").value);
var l2 = parseFloat(document.getElementById("longitud2").value);

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: {lat: -17.7851016, lng: -63.1803851},
    });

    map.addListener('click', function(event) {
        agregarMarcador(event.latLng);
    });

    map2 = new google.maps.Map(document.getElementById('map2'), {
        zoom: 12,
        center: {lat: -17.7851016, lng: -63.1803851},
    });

    marcador2 = new google.maps.Marker({
        position: {lat: l1, lng: l2},
        map: map2
    });



    map2.addListener('click', function(event) {
        agregarMarcador2(event.latLng);
    });
}


function agregarMarcador(location) {
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


function agregarMarcador2(location) {
    if ( marcador2 ) {
        marcador2.setPosition(location);
    } else {
        marcador2 = new google.maps.Marker({
            position: location,
            map: map2
        });
    }
    document.getElementById("long2").value = marcador2.getPosition().lng();
    document.getElementById("lati2").value = marcador2.getPosition().lat();
}