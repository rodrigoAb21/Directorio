@extends('layouts.app')
@section('contenido')
    <div class="container col-lg-8 col col-md-10 col-sm-11">
        <h2 align="center">REGISTRAR EMPRESA</h2>
        <form action="">
            <h3>Datos de la empresa</h3>
            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-6">
                    <label for="nombre">Nombre</label>
                    <input class="form-control" type="text" name="nombre" id="nombre">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6">
                    <label for="logo">Logo</label>
                    <input type="file" class="form-control-file" name="logo" id="logo">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6">
                    <label for="rubro">Rubro</label>
                    <select name="rubro_id" class="form-control" id="rubro">
                        @foreach ($rubros as $rubro)
                            <option value="{{$rubro -> id}}">{{$rubro -> nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6">
                    <label for="clave">Palabras clave</label>
                    <input class="form-control" type="text" name="clave" id="clave">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6">
                    <label for="web">Sitio Web</label>
                    <input class="form-control" type="text" name="web" id="web">
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                    <label for="descripcion">Descripcion</label>
                    <textarea class="form-control" type="text" name="descripcion" id="descripcion"></textarea>
                </div>
            </div>
            <hr>

            <h3>Ubicaciones <button class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg" type="button"><i class="fa fa-plus"></i></button></h3>

            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
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
                                        <input type="hidden" id="long1" />
                                        <input type="hidden" id="lati1" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <button class="btn btn-success" type="button" onclick="agregar()" data-dismiss="modal"><i class="fa fa-plus"></i> Agregar </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tabla">
                    <thead>
                    <tr>
                        <th scope="col">Opciones</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Dpto</th>
                        <th scope="col">Telf</th>
                        <th scope="col">Direccion</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                <button id="btSave" type="button" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>

    <script src="{{asset('js/mapaReg.js')}}"></script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPTexUsXgEQhRlOybpOk0AOqjSoAjE_v0&callback=initMap">
    </script>
    <script>
        var cont = 0;

        function agregar() {
            var nombre = $('#nombres').val();
            var telefono = $('#telefono').val();
            var departamento = $('#departamento option:selected').val();
            var direccion= $('#direccion').val();
            var latitud= $('#lati1').val();
            var longitud= $('#long1').val();



                var fila='<tr id="fila'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');"><i class="fa fa-trash" aria-hidden="true"></i></button><input type="hidden" name="longitudT[]" value="'+longitud+'"/><input type="hidden" name="latitudT[]" value="'+latitud+'"/></td><td><input type="hidden" name="nombreT[]" value="'+nombre+'"/>'+nombre+'</td><td><input type="hidden" name="departamentoT[]" value="'+departamento+'"/>'+departamento+'</td><td><input type="hidden" name="telefono[]" value="'+telefono+'"/>'+telefono+'</td><td><input type = "hidden" name = "direccion[]" value = "'+direccion+'" />'+direccion+'</td></tr>';

                cont++;

                limpiar();
                evaluar();
                $("#tabla").append(fila); // sirve para anhadir una fila a los detalles


        }

        function limpiar(){

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

        $(document).ready(function () {
           evaluar();
        });

    </script>

@endsection

