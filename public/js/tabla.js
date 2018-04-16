var cont = 0;

function agregar() {
    var nombre = $('#nombreU').val();
    var telefono = $('#telefono').val();
    var departamento = $('#departamento option:selected').val();
    var direccion= $('#direccion').val();
    var latitud= $('#lati1').val();
    var longitud= $('#long1').val();



    var fila='<tr id="fila'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');"><i class="fa fa-trash" aria-hidden="true"></i></button><input type="hidden" name="longitudT[]" value="'+longitud+'"/><input type="hidden" name="latitudT[]" value="'+latitud+'"/></td><td><input type="hidden" name="nombreT[]" value="'+nombre+'"/>'+nombre+'</td><td><input type="hidden" name="departamentoT[]" value="'+departamento+'"/>'+departamento+'</td><td><input type="hidden" name="telefonoT[]" value="'+telefono+'"/>'+telefono+'</td><td><input type = "hidden" name = "direccionT[]" value = "'+direccion+'" />'+direccion+'</td></tr>';

    cont++;

    $("#tabla").append(fila); // sirve para anhadir una fila a los detalles

    limpiar();
    evaluar();


}

function limpiar(){
    $('#nombreU').val("");
    $('#telefono').val("");
    $('#direccion').val("");
    $('#lati1').val("");
    $('#long1').val("");
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
