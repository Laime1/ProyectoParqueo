
@extends('layouts.template')
<!DOCTYPE html>
<html>
<head>
    <title>Registro de Entrada</title>
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
    <h1 class="titulo">Registro de Entrada</h1>
    
    <form method="POST" action="{{ route('control.entrada', ['codigoSIS' => '']) }}">
        @csrf
        <label for="codigoSIS">Código SIS:</label>
        <input type="text" name="codigoSIS" id="codigoSIS" required><br>
        <label for="">Hora de Entrada:</label><br>
        <input type="datetime-local" name="horaEntrada" id="horaEntrada" value="{{now()}}"><br>
        <input type="submit" value="Registrar entrada">
    </form>
</body>
</html>
@endsection
