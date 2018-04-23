@extends('layouts.app')
@section('contenido')

    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">Resultados del rubro: "{{$busqueda}}"</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-12 ">
                <h6 class="text-center" >Filtrar resultados</h6>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">Ver todos</a>
                    <a href="#" class="list-group-item list-group-item-action">Santa Cruz</a>
                    <a href="#" class="list-group-item list-group-item-action">Cochabamba</a>
                    <a href="#" class="list-group-item list-group-item-action">La Paz</a>
                    <a href="#" class="list-group-item list-group-item-action">Oruro</a>
                    <a href="#" class="list-group-item list-group-item-action">Potosi</a>
                    <a href="#" class="list-group-item list-group-item-action">Sucre</a>
                    <a href="#" class="list-group-item list-group-item-action">Tarija</a>
                    <a href="#" class="list-group-item list-group-item-action">Pando</a>
                    <a href="#" class="list-group-item list-group-item-action">Beni</a>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div id="lista" class="list-group mb-3" style="overflow-y: scroll; max-height: 500px">
                    @foreach($ubicaciones as $ubicacion)
                        <li id="{{$loop->index}}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{$ubicacion -> nombre}}</h5>
                                <small class="text-muted">{{$ubicacion -> departamento}}</small>
                            </div>
                            <p class="mb-1">{{$ubicacion -> direccion}}</p>
                            <small><i class="fa fa-phone"></i> {{$ubicacion -> telefono}}</small>
                        </li>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div id="map" style="width: 100%; height: 500px; background: #b4c1cd"></div>
            </div>
        </div>

    </div>



    @push('scripts')
        <script>
            var ubicaciones = [];

            @foreach($ubicaciones as $ubi)
            ubicaciones.push({id:'{{$ubi -> id}}', nombre:'{{$ubi -> nombre}}', direccion: '{{$ubi -> direccion}}', telefono: '{{$ubi -> telefono}}' , lati: parseFloat('{{$ubi -> latitud}}'), long: parseFloat('{{$ubi -> longitud}}')})
            @endforeach

            $("#lista li").hover(function () {
                var idHover = $(this).attr('id');
                resaltarMarcador(idHover);
            })

        </script>
        <script src="{{asset('js/ver.js')}}"></script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPTexUsXgEQhRlOybpOk0AOqjSoAjE_v0&callback=initMap">
        </script>
    @endpush
@endsection



























