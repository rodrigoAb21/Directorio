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
}

//-----------------------------------------------------------------------

var cont = 0;

function agregar() {
    var nombre = $('#nombreU').val();
    var telefono = $('#telefono').val();
    var departamento = $('#departamento option:selected').val();
    var direccion= $('#direccion').val();
    var latitud= marcador.getPosition().lat();
    var longitud= marcador.getPosition().lng();
    if (nombre && direccion){
        var fila='<tr id="fila'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');"><i class="fa fa-trash" aria-hidden="true"></i></button><input type="hidden" name="longitudT[]" value="'+longitud+'"/><input type="hidden" name="latitudT[]" value="'+latitud+'"/></td><td><input type="hidden" name="nombreT[]" value="'+nombre+'"/>'+nombre+'</td><td><input type="hidden" name="departamentoT[]" value="'+departamento+'"/>'+departamento+'</td><td><input type="hidden" name="telefonoT[]" value="'+telefono+'"/>'+telefono+'</td><td><input type = "hidden" name = "direccionT[]" value = "'+direccion+'" />'+direccion+'</td></tr>';
        $("#tabla").append(fila); // sirve para anhadir una fila a los detalles
        cont++;
        evaluar();
    }
    limpiar();
}

function limpiar(){
    $('#nombreU').val("");
    $('#telefono').val("");
    $('#direccion').val("");
}

function eliminar(index){

    cont--;

    $("#fila" + index).remove();
    evaluar();
}

function evaluar(){
    if (cont > 0) {
        $("#btSave").show();
    }else{
        $("#btSave").hide();
    }
}

body.onload = function(){
    evaluar()
};
