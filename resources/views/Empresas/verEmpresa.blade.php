@extends('layouts.app')
@section('contenido')

<div class="container border mt-2 mb-4">
    <div class="mt-1">
        <small class="text-right mt-2">
            <h4>
                <a href="{{url('empresa/editar/'.$empresa->id)}}" class="badge badge-success"><i class="fa fa-pencil-alt"></i></a>
                <a href="" class="badge badge-danger" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-trash"></i></a>
            </h4>
        </small>
    </div>
    <h1 class="text-center">{{$empresa -> nombre}}</h1>
    <div class="row">
        <div class="col-8">
            <label style="color: #BAC2CA">EMPRESA</label>
            <h5>{{$empresa -> nombre}}</h5>
            <label style="color: #BAC2CA">RUBRO</label>
            <h5><a href="">{{$empresa -> rubro -> nombre}}</a></h5>
            <label style="color: #BAC2CA">PAGINA WEB</label>
            <h5><a href="#" >{{$empresa -> web}}</a></h5>
            <label style="color: #BAC2CA">E-MAIL</label>
            <h5>{{$empresa -> email}}</h5>
        </div>
        <div class="col-4">
            <div class="container">
                <img src="{{asset('img/'.$empresa -> logo)}}" alt="logo" height="150px" width="150px" class="img-thumbnail">
            </div>
        </div>
    </div>
    <div class="row">
         <div class="col-12">
             <label style="color: #BAC2CA">DESCRIPCION</label>
             <h5><p class="text-justify">{{$empresa -> descripcion}}</p></h5>
         </div>
    </div>
    <hr>
    <p><h2>Ubicaciones</h2></p>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="list-group mb-3" style="overflow-y: scroll; max-height: 500px">
                @foreach($ubicaciones as $ubicacion)
                    <li class="list-group-item list-group-item-action flex-column align-items-start">
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
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div id="map" style="width: 100%; height: 500px; background: #b4c1cd"></div>
        </div>
    </div>
    {{$ubicaciones -> links()}}
</div>
</div>


@include('Empresas.modalEmpresa')

<script>
    var ubicaciones = [];
    var markers = [];
    var contenido = '<div class="container">'+
    '<h3>Nombre Lugar</h3>'+
    '<hr>'+
    '<p><b>Telefono: </b> 123456 </p>'+
    '<p><b>Direccion: </b> Un lugar lejano muy muy lejanos, por alla en un cerro #452 </p>'+
    '</div>';



    @foreach($ubicaciones as $ubi)
    ubicaciones.push({nombre:'{{$ubi -> nombre}}', direccion: '{{$ubi -> direccion}}' , lati: parseFloat('{{$ubi -> latitud}}'), long: parseFloat('{{$ubi -> longitud}}')})
    @endforeach

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center:{lat: -17.7851016, lng: -63.1803851},
        });

        ubicaciones.forEach(function (ele) {
            var marker = new google.maps.Marker({
                position: {lat: ele['lati'], lng: ele['long']},
                map: map,
                title: ele['nombre']
            });
            markers.push(marker);
        })

        var infowindow = new google.maps.InfoWindow({
            content: contenido,
            maxWidth: 250
        });

        markers[0].addListener('mouseover', function() {
            infowindow.open(map, markers[0]);
        });
        markers[0].addListener('mouseout', function() {
            infowindow.close();
        });

    }

</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPTexUsXgEQhRlOybpOk0AOqjSoAjE_v0&callback=initMap">
</script>

@endsection