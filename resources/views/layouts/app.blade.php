<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>TOPICOS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome/fontawesome-all.min.css')}}">
</head>
<body id="body">
<header>
<nav class="navbar navbar-light bg-light justify-content-between" >
 <a href="index.html" class="navbar-brand">DIRECTORIO</a>
    <form class="form-inline">
        <a href="verRubros.html" class="btn btn-outline-danger mr-1">Rubros</a>
        <a href="{{url('/registrarEmpresa')}}" class="btn btn-outline-warning">Registrar empresa <i class="fa fa-plus"></i></a>
        <div class="input-group">
            <input type="text" class="form-control ml-1" placeholder="Buscar" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <a href="listarBusqueda.html" class="btn btn-outline-primary" ><i class="fa fa-search"></i></a>
                <select name="filtro" class="form-control ml-1" id="filtro">
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
    </form>
</nav>
</header>

    @yield('contenido')

<script src="{{asset('js/jquery-3.2.1.slim.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>