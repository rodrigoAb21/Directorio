@extends('layouts.app')
@section('contenido')
    <div class="container col-lg-8 col col-md-10 col-sm-11">
        <h2 align="center">EDITAR EMPRESA: {{$empresa -> nombre}}</h2>


        {!!Form::open(array('url'=>'empresa/editar/'.$empresa->id,'method'=>'PATCH','autocomplete'=>'off', 'files' => 'true'))!!}
        {{Form::token()}}

            <h3>Datos de la empresa</h3>
            <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-6">
                    <label for="nombre">Nombre</label>
                    <input class="form-control" type="text" name="nombre" id="nombre" value="{{$empresa->nombre}}">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6">
                    <label for="logo">Logo</label>
                    <input type="file" class="form-control-file" name="logo" id="logo">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6">
                    <label for="rubro">Rubro</label>
                    <select name="rubro_id" class="form-control" id="rubro_id">
                        @foreach ($rubros as $rubro)
                            @if($rubro->id == $empresa->rubro_id)
                                <option selected value="{{$rubro -> id}}">{{$rubro -> nombre}}</option>
                            @else
                                <option value="{{$rubro -> id}}">{{$rubro -> nombre}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6">
                    <label for="clave">Palabras clave</label>
                    <input class="form-control" type="text" name="clave" id="clave" value="{{$empresa->clave}}">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email" value="{{$empresa->email}}">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6">
                    <label for="web">Sitio Web</label>
                    <input class="form-control" type="text" name="web" id="web" value="{{$empresa->web}}">
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                    <label for="descripcion">Descripcion</label>
                    <textarea class="form-control" type="text" name="descripcion" id="descripcion">{{$empresa->descripcion}}</textarea>
                </div>
            </div>
            <hr>

            <h3>Ubicaciones <button id="vModal" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg" type="button"><i class="fa fa-plus"></i></button></h3>

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
                    @foreach($ubicaciones as $ubicacion )
                    <tr>
                        <td>
                            <a href=""><button class="btn btn-warning"><i class="fa fa-pencil-alt"></i></button></a>
                            <a href=""><button class="btn btn-danger"><i class="fa fa-trash-alt"></i></button></a>

                        </td>
                        <td>{{$ubicacion->nombre}}</td>
                        <td>{{$ubicacion->departamento}}</td>
                        <td>{{$ubicacion->telefono}}</td>
                        <td>{{$ubicacion->direccion}}</td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                <button id="btSave" type="submit" class="btn btn-primary">Guardar</button>
            </div>
        {!!Form::close()!!}




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


    </div>

    <script src="{{asset('js/mapaReg.js')}}"></script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPTexUsXgEQhRlOybpOk0AOqjSoAjE_v0&callback=initMap">
    </script>


@endsection

