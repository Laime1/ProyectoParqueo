@extends('layouts.template')
<!DOCTYPE html>
<html>
<head>
    <title>Registro de Salida</title>
    <link rel="stylesheet" href="{{asset('Style/solicitud.css')}}">
</head>
@section('content')
<body>
    @if (session('error'))
    <li>{{session('error')}}</li>
    @endif
    @if (session('message'))
    <li>{{session('message')}}</li>
    @endif

    <h1>Registro de Salida</h1>
    
    <form method="POST" action="{{url('/control/salidas')}}">
        @csrf
        @method('PUT')
        <label for="codigoSIS">Código SIS:</label>
        <input type="text" name="codigoSIS" id="codigoSIS" required><br>
        <label for="">Hora de Salida:</label><br>
        <input type="datetime-local" name="horaSalida" id="horaSalida" value="{{now()}}"><br>
        <input type="submit" value="Registrar Salida">
    </form>
</body>
</html>
@endsection
