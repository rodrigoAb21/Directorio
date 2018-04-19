function modalEditRubro(id, nombre, icono) {
    $('#gestRubros').attr("action", "http://127.0.0.1:8000/rubros/editar/" + id);
    $('#metodo').val("PUT");

    $('#modalTitulo').html("Editar Rubro: " + nombre);
    $('#nombre').val(nombre);
    $('#icono').val(icono;

    $('#modalEditRubro').modal('show');
}
