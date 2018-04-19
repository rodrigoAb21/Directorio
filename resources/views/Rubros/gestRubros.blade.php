@extends('layouts.app')
@section('contenido')
    <div class="container col-lg-6 col col-md-8 col-sm-12">
        <h2>RUBROS  <button id="vModal" class="btn btn-success" data-toggle="modal" data-target="#modalRegistrarRubros" type="button"><i class="fa fa-plus"></i></button></h2>

            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tabla">
                    <thead>
                    <tr>
                        <th scope="col">Opciones</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Icono</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rubros as $rubro )
                    <tr>
                        <td>
                            <a><button class="btn btn-warning btn-sm" onclick="modalEditRubro('{{$rubro -> id}}', '{{$rubro -> nombre}}', '{{$rubro -> icono}}')"><i class="fa fa-pencil-alt"></i></button></a>
                            <a ><button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal" type="submit" ><i class="fa fa-trash-alt"></i></button></a>
                        </td>
                        <td>{{$rubro->nombre}}</td>
                        <td><i class="fa fa-{{$rubro->icono}}"></i></td>
                        <input type="hidden" value="{{$rubro}}" />
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @include('Rubros.modalRegistrarRubros');
        @include('Rubros.modalEliminarRubros');
    </div>

    @push('scripts')
    <script src="{{asset('js/rubros.js')}}"></script>
    @endpush
@endsection

