@extends('layouts.template')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('Style/listaSol.css')}}">
</head>

<body>
  <!--
<div class="col-auto my-1">
 <a href="{{route('solicitud.create')}}" class="btn btn-success">nuevo</a>
     </div>
-->
    <div class="container">
      <center>
    <label for="Titulo" class="Titulo" >Lista de Solicitudes</label>
    </center>
      <div class="row">
        <div class="col-lx-12">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th>Facultad</th>
                  <th>Tipo de solicitud</th>
                  <th>Detalle de solicitud</th>
                </tr>
              </thead>
              <tbody>
                @foreach($solicituds as $solicitud)
                <tr>
                  <td>{{$solicitud->idSolicitud}}</td>
                  <td>{{$solicitud->NombreC}}</td>
                  <td>{{$solicitud->ApellidoC}}</td>
                  <td>{{$solicitud->FacultadC}}</td>
                  <td>{{$solicitud->TipoSolicitud}}</td>
                  <td>{{$solicitud->DetalleSolicitud}}</td>

                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <br>
      <div class="col-auto my-1 ">
 <a href="{{url('/')}}" class="btn btn-primary">Volver a menu</a>
 <a href="{{route('solicitud.create')}}" class="btn btn-primary">Ir a registro</a>
     </div>
     <br>
    </div>
</body>
</html>
@endsection