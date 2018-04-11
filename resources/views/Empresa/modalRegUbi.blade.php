<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            {!!Form::open(array('url'=>'empresa/'.$empresa->id.'/registrarUbicacion','method'=>'POST','autocomplete'=>'off', 'files' => 'true'))!!}
            {{Form::token()}}
            <div class="modal-header">
                <h4>Nueva Ubicacion</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <label for="nombres">Nombre</label>
                            <input class="form-control" type="text" name="nombres" id="nombres">
                        </div>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <label for="telefono">Telefono</label>
                            <input class="form-control" type="tel" name="telefono" id="telefono">
                        </div>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <label for="departamento">Departamento</label>
                            <select class="form-control" name="departamento" id="departamento">
                                <option value="Santa Cruz">Santa Cruz</option>
                                <option value="La Paz">La Paz</option>
                                <option value="Cochabamba">Cochabamba</option>
                                <option value="Oruro">Oruro</option>
                                <option value="Potosi">Potosi</option>
                                <option value="Sucre">Sucre</option>
                                <option value="Tarija">Tarija</option>
                                <option value="Pando">Pando</option>
                                <option value="Beni">Beni</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <label for="direccion">Dirección</label>
                            <textarea name="direccion" id="direccion" rows="2" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div id="map" style="width: 100%; height: 400px; background: #b4c1cd; margin-bottom: 1rem"></div>
                            <input type="hidden" id="long1" name="longitud"/>
                            <input type="hidden" id="lati1" name="latitud"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <button id="addUbi" class="btn btn-success" type="submit"><i class="fa fa-plus"></i> Agregar </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
