@extends('layouts.template')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagos</title>
    <link rel="stylesheet" href="{{asset('Style/solicitud.css')}}">
</head>
@section('content')
<body>
    @if (session('message'))
    <li>{{session('message')}}</li>
    @endif
    <h1>Control de pagos</h1>
    <form action="{{url('/pagoss')}}" method="post">
        @csrf
        <label for="">Codigo SIS:</label>
        @if (isset($datos))
          @foreach ($datos as $dato)
          <input type="text" name="sis" id="sis"  oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); this.value = this.value.replace(/[^0-9]/,'')" minlength ="9" maxlength ="10" placeholder= "Ingrese CodigoSIS" value="{{$dato->CodigoSIS}}" required> 
          <input type="submit" name="accion" value="Buscar"><br>
          <label for="">Pagado hasta</label>
          <input type="date" name="desde" id="desde" value="{{$dato->pago_hasta}}"><br>
          @endforeach  
          @if (empty($datos))
           <input type="text" name="sis" id="sis"  oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); this.value = this.value.replace(/[^0-9]/,'')" minlength ="9" maxlength ="10" placeholder= "Ingrese CodigoSIS" value="{{$CodigoSIS ?? ''}}" required> 
           <input type="submit" name="accion" value="Buscar"><br>
           <label for="">Pagar desde</label>
           @foreach($desdes as $desde)
           <input type="date" name="desde" id="desde" value="{{$desde->fecha_inicio}}">;
           @endforeach
          @endif
        @else
          <input type="text" name="sis" id="sis"  oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); this.value = this.value.replace(/[^0-9]/,'')" minlength ="9" maxlength ="10" placeholder= "Ingrese CodigoSIS"  required> 
          <input type="submit" name="accion" value="Buscar"><br>
          <label for="">Pagado hasta</label>
          <input type="date" name="desde" id="desde" value="{{ date('Y-m-d') }}"><br> 
        @endif
        @if (isset($monto))
        <label for="">Meses a pagar</label>
        <input type="number" name="meses" id="meses" value="{{$meses}}"><br>
        <label for="">Monto a Pagar:</label>
        <input type="text" name="monto" id="monto" value="{{$monto}}">
        @else
        <label for="">Meses a pagar</label>
        <input type="number" name="meses" id="meses"><br>
        <label for="">Monto a Pagar:</label>
        <input type="text" name="monto" id="monto" value="">
        @endif
        <input type="submit" name="accion" value="Calcular"><br>
        <input type="submit" name="accion"  value="cobrar">
        

    </form>
</body>
</html>
@endsection