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
                                        <label for="direccion">Dirección</label>
                                        <input class="form-control" type="text" name="direccion" id="direccion">
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
                                <button class="btn btn-success" type="button"><i class="fa fa-plus"></i> Agregar </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Opciones</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">DPTO</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Direccion</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>
                            <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </th>
                        <td>Hipermaxi Sur</td>
                        <td>SCZ</td>
                        <td>3365254</td>
                        <td>Av. Santos Dumont. 3er anillo</td>
                    </tr>
                    <tr>
                        <th>
                            <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </th>
                        <td>Hipermaxi Las Palmas</td>
                        <td>SCZ</td>
                        <td>3365254</td>
                        <td>Doble via la Guardia 4to anillo</td>
                    </tr>
                    <tr>
                        <th>
                            <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </th>
                        <td>Hipermaxi Roca y Coronado</td>
                        <td>SCZ</td>
                        <td>3363354</td>
                        <td>Av.Roca y Coronado entre 3er y 4to anillo</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-danger">Atras</button>
                <a href=""><button id="guardar" type="button" class="btn btn-primary">Guardar</button></a>
            </div>
        </form>
    </div>

    <script src="{{asset('js/mapaReg.js')}}"></script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPTexUsXgEQhRlOybpOk0AOqjSoAjE_v0&callback=initMap">
    </script>
    <script>
        $(document).ready(
            function () {
                evaluar();
                $('#bt_add').click(
                    function () {
                        agregar();
                        evaluar();
                    }
                );
            }
        );

        var cont = 0;

        function agregar() {
            var nombre = $('#nombres').val();
            var telefono = $('#telefono').val();
            var departamento = $('#departamento option:selected').val();
            var direccion= $('#direccion').val();
            var latitud= $('#lati1').val();
            var longitud= $('#long1').val();

            if (idProductoT != "" && cantidad != "" && cantidad > 0) {
                subTotal[cont] = (cantidad * costo);
                total = total + subTotal[cont];


                var fila='<tr id="fila'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');"><i class="fa fa-remove" aria-hidden="true"></i></button></td><td><input type="hidden" name="idProductoT[]" value="'+idProductoT+'">'+nombreProducto+'</td><td><input type="hidden" name="cantidadTabla[]" value="'+cantidad+'">'+cantidad+'</td><td><input type="hidden" name="costoTabla[]" value="'+costo+'">'+costo+'</td><td><input type = "hidden" name = "subTotal[]" value = "'+subTotal[cont]+'" >'+subTotal[cont]+'</td> </tr>';

                cont++;

                limpiar();
                $("#stotal").html("Bs." + total);
                $("#total_costo").html("Bs." + total);//  html porq es un h4
                $("#montoTotal").val(total);// val porq es un input
                $("#detalle").append(fila); // sirve para anhadir una fila a los detalles
            }

        }

        function limpiar(){
            $("#cant").val("");
        }

        function eliminar(index){
            total = total - subTotal[index];
            $("#stotal").html("Bs. "+total);
            $("#total_costo").html("Bs. "+total);
            $("#montoTotal").val(total);

            cont--;

            $("#fila" + index).remove();
            evaluar();
        }

        function evaluar(){
            if (cont > 0) {
                $("#guardar").show();
            }else{
                $("#guardar").hide();
            }
        }

    </script>

@endsection

