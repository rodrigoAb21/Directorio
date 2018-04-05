@extends('layouts.app')
@section('contenido')

<div class="container border mt-2 mb-3">
    <div class="mt-1">
        <small class="text-right mt-2">
            <h4>
                <a href="editarEmpresa.html" class="badge badge-success"><i class="fa fa-pencil-alt"></i></a>
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
    </div>
</div>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center mt-2">
        <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Anterior</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#">Siguiente</a>
        </li>
    </ul>
</nav>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Desea eliminar la empresa: Hipermaxi?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<script>
    var arreglo = [];
    @foreach($ubicaciones as $ubi)
    arreglo.push({nombre:'{{$ubi->nombre}}', lati: parseFloat('{{$ubi -> latitud}}'), long: parseFloat('{{$ubi -> longitud}}')})
    @endforeach

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center:{lat: -17.7851016, lng: -63.1803851},
        });

        arreglo.forEach(function (ele) {
            var marker = new google.maps.Marker({
                position: {lat: ele['lati'], lng: ele['long']},
                map: map,
                title: ele['nombre']

            });
        })
    }

</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPTexUsXgEQhRlOybpOk0AOqjSoAjE_v0&callback=initMap">
</script>

@endsection