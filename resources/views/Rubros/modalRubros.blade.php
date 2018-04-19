<div class="modal fade hide bd-edit-modal-lg" id="modalRegistrarRubros" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" action="{{url('rubros/registrar')}}" autocomplete="off">
                <input type="hidden" name="_method" value="POST" id="metodo">
                {{ csrf_field() }}
            <div class="modal-header">
                <h4 id="modalTitulo">Registrar Rubro</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <label for="nombres">Nombre</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" required>
                        </div>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <label for="icono">Icono</label>
                            <input class="form-control" type="text" name="icono" id="icono" required>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Guardar </button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
