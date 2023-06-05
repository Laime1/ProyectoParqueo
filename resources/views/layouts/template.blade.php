<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('template/template.css') }}">
    <title>Document</title>
</head>
<header>
<nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{url('/')}}">
                <img src="{{asset('imagenes/logofcyt.png')}}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url('/')}}" >
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;" > Inicio</font>
                            </font>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url('/maquetado')}}" >
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;" >Maquetado</font>
                            </font>
                        </a>
                    </li>
                   

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit; color:white; " >
                                    Solicitudes
                                </font>
                            </font>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-start">
                            <li><a class="dropdown-item" href="{{route('solicitud.create')}}">Registro de solicitud</a></li>
                            <li><a class="dropdown-item" href="{{url('/maquetado')}}">Verificacion de espacios</a></li>
                            <li><a class="dropdown-item" href="{{url('/solicitud')}}">Lista de Solicitud</a></li>
                        </ul>
                    </li>

                   <!--
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url('/solicitud')}}" >
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;" >Solicitudes</font>
                            </font>
                        </a>
                    </li>

-->
<!--
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit; color:white; " >
                                    Usuarios
                                </font>
                            </font>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-start">
                            <li><a class="dropdown-item" href="#">Administrador</a></li>
                            <li><a class="dropdown-item" href="#">Personal</a></li>
                            <li><a class="dropdown-item" href="#">Clientes</a></li>
                        </ul>
                    </li>
-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle align-content-end align-items-end" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit; color:white; " >
                                    Registros
                                </font>
                            </font>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end align-items-end">
                            <li><a class="dropdown-item" href="{{route('personal.create')}}">Registro de personal</a></li>
                            <li><a class="dropdown-item" href="{{route('clientes.create')}}">Registro de clientes</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url('/formulario-correo')}}" >
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;" >mensajes</font>
                            </font>
                        </a>
                    </li>
<!--
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit; color:white; ">
                                    Contacto
                                </font>
                            </font>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-start">
                            <li><a class="dropdown-item" href="#">Correo</a></li>
                            <li><a class="dropdown-item" href="#">Telefonos</a></li>
                            <li><a class="dropdown-item" href="#">Reclamos/Quejas</a></li>
                        </ul>
                    </li>
--> 
                </ul>
            </div>
        </div>
    </nav>
</header>
<body class="d-flex flex-column">
    <h1></h1>
    <!-- <header>
        <img src="{{ asset('template/logo.png') }}" width="60px" alt="Logo de ProductMarket">
    </header> -->

    <div class="margen" style="background: #white; min-height:800px">
        @yield('content') @section('content')
        </div>

        <div class="footer"></div>
    </body>
    
</html>