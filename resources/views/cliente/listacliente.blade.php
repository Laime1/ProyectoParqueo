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
      <label for="Titulo" class="Titulo">Lista de clientes</label>
    </center>
    <div class="row">
      <div class="col-lx-12">
        <form action="{{route('clientes.index')}}" method="get">
          <div class="form-row">
            <div class="col-sm-4 my-1">
              <input type="text" class="form-control" name="texto" >
            </div>
            <div class="col-auto my-1">
              <input type="submit" class="btn btn-primary" value="buscar">
            </div>
          </div>
        </form>
      </div>
      <div class="col-lx-12">
        <div class="table-responsive">
          <table class="table table-striped">
            
              
                <th></th>
                <th>Codigo SIS</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Placa</th>
                <th>Tipo de vehiculo</th>
                <th>Puesto de Parqueo</th>
              
            
            <tbody>
              @if(count($clientess)<=0)
              <tr>
                <td colspan="8">No hay resultados </td>
              </tr>
              @else

              @foreach($clientess as $cli)
              <tr>
                <td><a href="{{route('clientes.edit',$cli->CodigoSIS)}}" class="btn btn-warning btn-sm">Editar</a>
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$cli->CodigoSIS}}">
                    Eliminar
                  </button>
                </td>
                <td>{{$cli->CodigoSIS}}</td>
                <td>{{$cli->Nombre}}</td>
                <td>{{$cli->Apellido}}</td>
                <td>{{$cli->Email}}</td>
                <td>{{$cli->Telefono}}</td>
                <td>{{$cli->Placa}}</td>
                <td>{{$cli->Vehiculo}}</td>
                <td>{{$cli->Puesto}}</td>
              </tr>
              @include('cliente.eliminarcliente')
              @endforeach
              @endif
            </tbody>
          </table>
          {{$clientess->links()}}
        </div>
      </div>
    </div>
    <br>
    <div class="col-auto my-1 ">
      <a href="{{url('/')}}" class="btn btn-primary">Volver a menu</a>
      <a href="{{route('clientes.create')}}" class="btn btn-primary">Ir a registro</a>
    </div>
    <br>
  </div>
</body>

</html>
@endsection