var marcadores = [];
var map;

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 5.7,
        center:{lat: -17.7851016, lng: -63.1803851},
    });

    for (var i = 0; i < ubicaciones.length; i++){
        var marker = new google.maps.Marker({
            position: {lat: ubicaciones[i]['lati'], lng: ubicaciones[i]['long']},
            map: map,
            icon:"http://maps.google.com/mapfiles/ms/micons/blue-dot.png",
            id: ubicaciones[i]['id'],
            title: ubicaciones[i]['nombre']
        });
        marcadores.push(marker);
    }
}

function resaltarMarcador(id){
    for(var j=0;j<marcadores.length;j++){
        if(marcadores[j].id == id){
            if (marcadores[j].getIcon() == "http://maps.google.com/mapfiles/ms/micons/red-dot.png") {
                marcadores[j].setIcon("http://maps.google.com/mapfiles/ms/micons/blue-dot.png");
            } else {
                marcadores[j].setIcon("http://maps.google.com/mapfiles/ms/micons/red-dot.png");
            }
        }
    }
}
