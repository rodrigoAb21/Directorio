var map;
var marcador;
centro = {lat: -17.7851016, lng: -63.1803851};

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: centro,
    });

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

    document.getElementById("longitud").value = marcador.getPosition().lng();
    document.getElementById("latitud").value = marcador.getPosition().lat();
}

// -----------------------------------------------------------------------------

function modalEdit (id, nombre, telf, dir, dpto, lat, lng) {
    $('#formEdit').attr("action", "http://127.0.0.1:8000/ubicacion/editar/" + id);
    $('#metodo').val("PUT");

    $('#modalTitulo').html("Editar ubicacion: " + nombre);
    $('#nombreU').val(nombre);
    $('#telefono').val(telf);
    $('#direccion').val(dir);
    $('#departamento').val(dpto);
    $('#latitud').val(lat);
    $('#longitud').val(lng);

    agregarMarcador({ lat: parseFloat(lat), lng: parseFloat(lng)});

    $('#modalEdit').modal('show');
}

function modalReg (id) {
    $('#formEdit').attr("action", "http://127.0.0.1:8000/empresa/" + id + "/registrarUbicacion");
    $('#metodo').val("POST");
    $('#modalTitulo').html("Nueva ubicacion");
    limpiarCampos();
    agregarMarcador(centro);

    $('#modalEdit').modal('show');
}

function limpiarCampos() {
    $('#nombreU').val("");
    $('#telefono').val("");
    $('#direccion').val("");
    $('#latitud').val(centro.lat);
    $('#longitud').val(centro.lng);
}







