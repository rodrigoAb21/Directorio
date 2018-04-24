@extends('layouts.app')
@section('contenido')

    <div class="container mt-2">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">Resultados de{{$busqueda}}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div id="lista" class="list-group mb-3" style="overflow-y: scroll; max-height: 500px">
                    @foreach($empresas as $empresa)
                        <li id="{{$empresa->id}}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h4 class="mb-1">{{$empresa -> nombre}}</h4>
                                <small><img src="{{asset('img/'.$empresa -> logo)}}" alt="logo" height="50px" width="50px" class="img-thumbnail"></small>
                            </div>
                            <small><a href="https://{{$empresa -> web}}" target="_blank"><i class="fa fa-globe"></i> {{$empresa -> web}}</a></small>
                            <p class="mb-1"><i class="fa fa-envelope"></i> {{$empresa -> email}}</p>
                        </li>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12">
                <div id="map" style="width: 100%; height: 500px; background: #b4c1cd"></div>
            </div>
        </div>
        <nav class="pagination justify-content-center mt-3">{{$empresas ->appends(\Input::except('page'))->links()}}</nav>
    </div>



    @push('scripts')
        <script>
            var ubicaciones = [];

            @foreach($ubicaciones as $ubi)
            ubicaciones.push({id:'{{$ubi -> id}}', nombre:'{{$ubi -> nombre}}', lati: parseFloat('{{$ubi -> latitud}}'), long: parseFloat('{{$ubi -> longitud}}')})
            @endforeach

            $("#lista li").hover(function () {
                var idHover = $(this).attr('id');
                resaltarMarcador(idHover);
            });

            $("#lista li").click(function () {
                window.open(
                    'http://127.0.0.1:8000/empresa/'+$(this).attr('id'),
                    '_blank'
                );
            });


        </script>
        <script src="{{asset('js/ver.js')}}"></script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPTexUsXgEQhRlOybpOk0AOqjSoAjE_v0&callback=initMap">
        </script>
    @endpush
@endsection



























