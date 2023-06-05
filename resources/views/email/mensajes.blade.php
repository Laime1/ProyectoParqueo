@extends('layouts.template')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar correos</title>
    <link rel="stylesheet" href="{{asset('Style/mensajes.css')}}">
</head>
<body>
    @if (session('success'))
    <li>{{session('success')}}</li>
    @endif
    
    <form action="{{url('/clientess')}}" method="get">

             <label for="">Enviar a:</label>
             <input type="text" name="sis" id=""  oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); this.value = this.value.replace(/[^0-9]/,'')" minlength ="9" maxlength ="10" placeholder= "Ingrese CodigoSIS"  required>
             <input type="submit" value="buscar">
             
    </form>

    <form action="{{url('/enviar-correo')}}" method="post">
        <h2>Envio de Notificaciones</h2>

        @csrf
        @if (isset($datos))
          @foreach ($datos as $dato)
              <label for=""><b>Codigo SIS:</b></label>
              <label for="">{{$dato->CodigoSIS}}</label><br>
              <label for=""><b>Email:</b></label>
              <input type="email" name="Destino" value="{{$dato->Email}}"><br>
          @endforeach
              <label for=""><b>Mensaje</label></b><br>
              <textarea name="Mensaje"  cols="30" rows="4" placeholder= "Ingrese un mensaje" maxlength ="250" required></textarea><br>
              <input type="reset" value="Cancelar">
              <button type="submit">Enviar correo</button>
        @endif

    </form>
</body>
</html>
@endsection
        