@extends('layouts.template')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('Style/solicitud.css')}}">

    <title>Solicitudes</title>
</head>
@section('content')
<body>
<form method="POST" action="{{ route('solicitud.store') }}">
        @csrf
        
        <label for="nombre">Nombre:</label>
        <input type="text" name="sis" id="sis"  oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); this.value = this.value.replace(/[^0-9]/,'')" minlength ="9" maxlength ="10" placeholder= "Ingrese CodigoSIS"  required>

        
        <label for="descripcion">Descripción:</label><br>
        <textarea name="descripcion" id="descripcion" rows="5" required></textarea><br>

        <label for="fecha_hora">Fecha:</label>
        <input type="datetime-local" name="fecha_hora" id="fecha_hora" value="{{now()}}"><br>
        
        <input type="submit" value="Enviar Solicitud">
    </form>
</body>
</html>
@endsection
