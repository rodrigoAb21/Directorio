@extends('layouts.app')
@section('contenido')
    <div class=" text-center" >
        <div class="mt-5">
            <h1 class="display-3">Bienvenido</h1>
            <hr class="col-2">
                <form>
                    <div class="container col-8">
                        <div class="form-row">
                            <div class="col-8">
                                <input class="form-control" type="search" placeholder="¿Qué buscas?" aria-label="Buscar" >
                            </div>
                            <div class="col-4">
                                <select name="filtro2" class="form-control" id="filtro2">
                                    <option value="">Lugar</option>
                                    <option value="">Santa Cruz</option>
                                    <option value="">Cochabamba</option>
                                    <option value="">La Paz</option>
                                    <option value="">Oruro</option>
                                    <option value="">Potosi</option>
                                    <option value="">Sucre</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="listarBusqueda.html" class="btn btn-primary btn-lg mt-3 col4"><i class="fa fa-search"></i> BUSCAR</a>
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
