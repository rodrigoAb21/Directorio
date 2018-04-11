<div class="modal fade hide bd-edit-modal-lg" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="formEdit" method="POST" action="" autocomplete="off">
                {{ csrf_field() }}{{ method_field('PUT') }}
            <div class="modal-header">
                <h4 id="modalTitulo">Editar Ubicacion</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <label for="nombres">Nombre</label>
                            <input class="form-control" type="text" name="nombre2" id="nombre2">
                        </div>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <label for="telefono">Telefono</label>
                            <input class="form-control" type="tel" name="telefono2" id="telefono2">
                        </div>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <label for="departamento">Departamento</label>
                            <select class="form-control" name="departamento2" id="departamento2">
                                @foreach($dptos as $dpto)
                                    <option value="{{$dpto}}">{{$dpto}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <label for="direccion">Dirección</label>
                            <textarea name="direccion2" id="direccion2" rows="2" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div id="map2" style="width: 100%; height: 400px; background: #b4c1cd; margin-bottom: 1rem"></div>
                            <input type="" id="longitud2" name="longitud2"/>
                            <input type="" id="latitud2" name="latitud2"/>
                        </div>
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
