@extends('layouts.template')
<!DOCTYPE html>
<html>
<head>
    <title>Crear Queja o Reclamo</title>
    <link rel="stylesheet" href="{{asset('Style/solicitud.css')}}">

</head>
@section('content')

<body>
    <h1> Queja o Reclamo</h1>
    @if (session('success'))
    <li>{{session('success')}}</li>
    @endif
    <form method="POST" action="{{ route('quejas.store') }}">
        @csrf
        
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        
        <label for="descripcion">Descripción:</label><br>
        <textarea name="descripcion" id="descripcion" rows="5"></textarea><br>

        
        
        <input type="submit" value="Enviar Queja o Reclamo">
    </form>
</body>
</html>
@endsection