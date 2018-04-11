var map, map2;
var marcador, marcador2;



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

    map2.addListener('click', function(event) {
        agregarMarcador2(event.latLng);
    });
}

function addM() {
    var l1 = $('#nombre2').val();
    console.log(l1);

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
    document.getElementById("longitud3").value = marcador2.getPosition().lng();
    document.getElementById("latitud3").value = marcador2.getPosition().lat();
}