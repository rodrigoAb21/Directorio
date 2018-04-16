var map;
var marcador;
var centro = {lat: -17.7851016, lng: -63.1803851};

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: centro,
    });

    agregarMarcador(centro);

    map.addListener('click', function(event) {
        agregarMarcador(event.latLng);
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