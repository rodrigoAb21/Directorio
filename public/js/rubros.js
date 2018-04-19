
function modalEditRubro(id, nombre, icono) {
    $('#formModalRubro').attr("action", "http://127.0.0.1:8000/rubros/editar/" + id);
    $('#metodo').val("PUT");

    $('#modalTitulo').html("Editar Rubro: " + nombre);
    $('#nombre').val(nombre);
    $('#icono').val(icono);

    $('#modalRubros').modal('show');
}

function modalRegistrarRubro() {
    $('#nombre').val("");
    $('#formModalRubro').attr("action", "http://127.0.0.1:8000/rubros/registrar");
    $('#metodo').val("POST");
    $('#modalTitulo').html("Registrar Rubro");
    $('#modalRubros').modal('show');
}


function modalEliminarRubro(id,nombre) {
    $('#formModalEliminarRubro').attr("action", "http://127.0.0.1:8000/rubros/eliminar/" + id);

    $('#textoEliminar').html("¿Desea eliminar el rubro: " + nombre+" ?");

    $('#modalEliminarRubro').modal('show');
}