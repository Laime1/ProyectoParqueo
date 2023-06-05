@extends('layouts.template')


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('Style/solicitud.css')}}">
  <title>Recepcion de solicitudes</title>
</head>
@section('content')
<body>
  <div class="container">
    <form action="{{route('solicitud.store')}}" method="POST">
      @csrf
      <label for="Titulo" class="Titulo">Datos para la solicitud</label>
      <div class="form-group row">
        <label for="Nombre" >Nombre</label>
        <div class="col-sm-10">
          <input name="Nombre" type="text" class="form-control" id="Nombre" required="" oninput="this.value = this.value.replace(/[^\a-\z\A-\Z\ñ\Ñ ]/g,'')"  minlength ="3" maxlength ="30">
        </div>
      </div>

      <div class="form-group row">
        <label for="Apellido" >Apellidos</label>
        <div class="col-sm-10">
          <input name="Apellido" type="text" class="form-control" id="Apellido" required="" oninput="this.value = this.value.replace(/[^\a-\z\A-\Z\ñ\Ñ ]/g,'')"  minlength ="3" maxlength ="30">
        </div>
      </div>

      <div class="form-group row">
        <label for="Facultad" >Facultad</label>
        <div class="col-sm-10">
          <input name="Facultad" type="text" class="form-control" id="Facultad" required="" oninput="this.value = this.value.replace(/[^\a-\z\A-\Z\ñ\Ñ ]/g,'')"  minlength ="3" maxlength ="30">
        </div>
      </div>

      <div class="form-group row">
        <label for="TipoSol" >Tipo de Solicitud</label>
        <div class="col-sm-10">
          <input name="TipoSol" type="text" class="form-control" id="TipoSol" required="" oninput="this.value = this.value.replace(/[^\a-\z\A-\Z\ñ\Ñ ]/g,'')"  minlength ="3" maxlength ="30">
        </div>
      </div>

      <div class="form-group row">
        <label for="DetalleSol" >Detalle de la Solicitud</label>
        <div class="col-sm-10">
          <input name="DetalleSol" type="text" class="form-control" id="DetalleSol" required="" oninput="this.value = this.value.replace(/[^\a-\z\A-\Z\ñ\Ñ ]/g,'')"  minlength ="3" maxlength ="100">
        </div>
      </div>
      
      <div class="form-group ">
        <input type="submit" class="btn btn-primary" value="Guardar">
        <input type="reset" class="btn btn-primary" value="Cancelar">
       
      </div>
      <br>
    </form>
  </div>
</body>

</html>
@endsection