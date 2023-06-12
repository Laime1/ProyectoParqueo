<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Control de pagos</h1>
    <form action="{{url('/pagoss')}}" method="post">
        @csrf
        <label for="">Codigo SIS:</label><br>
        @if (isset($datos))
          @foreach ($datos as $dato)
          <input type="text" name="sis" id="sis"  oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); this.value = this.value.replace(/[^0-9]/,'')" minlength ="9" maxlength ="10" placeholder= "Ingrese CodigoSIS" value="{{$dato->CodigoSIS}}" required> 
          <input type="submit" name="accion" value="Buscar"><br>
          <label for="">Pagar desde</label>
          <input type="date" name="desde" id="desde" value="{{$dato->pago_hasta}}">
          @endforeach  
          @if (empty($datos))
          <input type="text" name="sis" id="sis"  oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); this.value = this.value.replace(/[^0-9]/,'')" minlength ="9" maxlength ="10" placeholder= "Ingrese CodigoSIS"  required> 
          <input type="submit" name="accion" value="Buscar"><br>
          <label for="">Pagar desde</label>

           <input type="date" name="desde" id="desde" value="{{ date('Y-m-d') }}"> 
          @endif
        @else
          <input type="text" name="sis" id="sis"  oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); this.value = this.value.replace(/[^0-9]/,'')" minlength ="9" maxlength ="10" placeholder= "Ingrese CodigoSIS"  required> 
          <input type="submit" name="accion" value="Buscar"><br>
          <label for="">Pagar desde</label>
          <input type="date" name="desde" id="desde" value="{{ date('Y-m-d') }}"> 
        @endif

        <label for="">hasta</label>
        @if(isset($monto))
          @if (isset($hasta))
           <input type="date" name="hasta" id="hasta" value="{{$hasta}}"><br>

          @endif
           <label for="">Monto a Pagar:</label>
           <input type="text" name="monto" id="monto" value="{{$monto}}">
        @else
           <input type="date" name="hasta" id="hasta" value="{{date('Y-m-d')}}"><br>
           <label for="">Monto a Pagar:</label>
           <input type="text" name="monto" id="monto">
        @endif
        <input type="submit" name="accion" value="Calcular"><br>
        <input type="submit" name="accion"  value="cobrar">
        

    </form>
</body>
</html>