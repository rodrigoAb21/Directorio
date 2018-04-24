@extends('layouts.app')
@section('contenido')
    <div class=" text-center" >
        <div class="mt-5">
            <h1 class="display-3">Bienvenido</h1>
            <hr class="col-2">
                <form method="GET" action="{{url('busqueda')}}">
                    {{csrf_field()}}
                    <div class="container col-8">
                        <div class="form-row">
                            <div class="col-12">
                                <input class="form-control" type="search" name="busqueda" placeholder="¿Qué buscas?" aria-label="Buscar" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-lg mt-3" type="submit"><i class="fa fa-search"></i> BUSCAR</button>
                    </div>
                </form>
            <div class="container">
                <div class="btn-group btn-group-sm mt-3" role="group" aria-label="Basic example">
                    <h5>
                        <a href="" class="badge badge-secondary "><i class="fa fa-wrench"></i> Taller</a>
                        <a href="" class="badge badge-secondary "><i class="fa fa-pills"></i> Farmacia</a>
                        <a href="" class="badge badge-secondary "><i class="fa fa-book"></i> Libreria</a>
                        <a href="" class="badge badge-secondary "><i class="fa fa-utensils"></i> Restaurant</a>
                        <a href="" class="badge badge-secondary "><i class="fa fa-graduation-cap"></i> Universidad</a>
                        <a href="" class="badge badge-secondary"><i class="fa fa-ambulance"></i> Hospital</a>
                        <a href="" class="badge badge-secondary "><i class="fa fa-shopping-cart"></i> Mercado</a>
                        <a href="" class="badge badge-secondary ">Ver más</a>
                    </h5>
                </div>
            </div>
        </div>
    </div>
@endsection
