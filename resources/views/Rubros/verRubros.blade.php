@extends('layouts.app')
@section('contenido')
    <div class="mt-2 mr-3">
        <small class="text-right"><a href="{{url('rubros')}}"><h4><span class="badge badge-success"><i class="fa fa-cogs"></i></span></h4></a></small>
    </div>
    <div class="container">
        <div class="row">
            @foreach($rubros as $rubro)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <a id="rubroIco" href="{{url('rubro/'.$rubro -> id)}}">
                        <div class="card-deck">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="container">
                                        <i style="font-size:4em" class="fa fa-{{$rubro -> icono}}"></i>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <h5>{{$rubro -> nombre}}</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection