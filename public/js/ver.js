var marcadores = [];
var map;
var ultimaVentana;

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center:{lat: -17.7851016, lng: -63.1803851},
    });

    for (var i = 0; i < ubicaciones.length; i++){
        var marker = new google.maps.Marker({
            position: {lat: ubicaciones[i]['lati'], lng: ubicaciones[i]['long']},
            map: map,
            id: i,
            title: ubicaciones[i]['nombre']
        });
        marcadores.push(marker);

        var contenido = '<div>'+
            '<h6>'+ubicaciones[i]['nombre']+'</h6>'+
            '<hr>'+
            '<p><b>Telefono: </b>'+ubicaciones[i]['telefono']+'<br>'+
            '<b>Direccion: </b>'+ubicaciones[i]['direccion']+' </p>'+
            '</div>';



        var infowindow = new google.maps.InfoWindow()
        google.maps.event.addListener(marker,'click', (function(marker,contenido,infowindow){
            return function() {
                cerrarUltimaV();
                infowindow.setContent(contenido);
                infowindow.setOptions({maxWidth:150});
                infowindow.open(map,marker);
                ultimaVentana = infowindow;
            };
        })(marker,contenido,infowindow));

    }
}

function resaltarMarcador(id){
    for(var j=0;j<marcadores.length;j++){
        if(marcadores[j].id == id){
            if (marcadores[j].getAnimation() != null) {
                marcadores[j].setAnimation(null);
            } else {
                marcadores[j].setAnimation(google.maps.Animation.BOUNCE);
                map.setCenter(marcadores[j].getPosition());
            }
            break;
        }
    }
}

function cerrarUltimaV() {
    if (ultimaVentana) {
        ultimaVentana.close();
    }
}