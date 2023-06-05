@extends('layouts.template')

<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Correo</title>
    <link rel="stylesheet" href="{{asset('Style/mensajes.css')}}">

</head>
@section('content')
<body>
    @if (session('success'))
    <li>{{session('success')}}</li>
    @endif
<form action="{{url('/clientess')}}" method="get">

<label for="">Enviar a:</label>
<input type="text" name="sis" id=""  oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); this.value = this.value.replace(/[^0-9]/,'')" minlength ="9" maxlength ="10" placeholder= "Ingrese CodigoSIS"  required>
<input type="submit" value="buscar">

</form>
<h2>Envio de notificaciones</h2>
    <form method="POST" action="/enviar-correo">
        @csrf
        @if (isset($datos))
        @foreach ($datos as $dato)
        <label for=""><b>Nombre:</b></label>
        <label for="nombre">{{$dato->Nombre}}</label><br>
        <label for=""><b>CodigoSIS:</b></label>
        <label for="">{{$dato->CodigoSIS}}</label><br>
        <label for=""><b>Email:</b></label>
        <label for="">{{$dato->Email}}</label><br>
        @endforeach
        <label for=""><b>Mensaje:</b></label><br>
        <textarea name="mensaje" id="mensaje" rows="5" ></textarea>
        <button type="submit">Enviar correo</button>
        @endif
    </form>
</body>
</html>
@endsection