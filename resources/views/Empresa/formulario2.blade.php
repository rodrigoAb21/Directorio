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
                            <button class="btn btn-warning" type="button" onclick="mostrarModal('{{$ubicacion -> id}}', '{{$ubicacion -> nombre}}', '{{$ubicacion -> telefono}}', '{{$ubicacion -> direccion}}', '{{$ubicacion -> departamento}}', '{{$ubicacion -> latitud}}', '{{$ubicacion -> longitud}}')"><i class="fa fa-pencil-alt"></i></button>
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
        @include('Empresa.modalRegUbi')
    </div>

    @include('Empresa.modalEditUbi')

    <script src="{{asset('js/edit.js')}}"></script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPTexUsXgEQhRlOybpOk0AOqjSoAjE_v0&callback=initMap">
    </script>

@endsection

