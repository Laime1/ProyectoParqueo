@extends('layouts.template')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('Style/maquetado.css')}}">
    <title>Parqueo 2</title>
</head>
<body>
    @section('content')
    <div id="principal">
      <div></div>
        <div id="fila_1">
            @foreach ($puestoss as $puesto)
             @if(($puesto->numero)>=1&&($puesto->numero)<=25)
               @foreach($clientess as $cliente)
                @if(($puesto->cliente_sis)==($cliente->CodigoSIS))
                  <button class="button" onmouseover="mostrarDialogo('{{$cliente->Nombre}}','{{$cliente->Apellido}}','{{$cliente->Placa}}','{{$cliente->NombreSecundario}}','{{$cliente->ApellidoSecundario}}')"  onmouseout="cerrarDialogo()" onclick="mostrarModal('{{$puesto->numero}}','{{$puesto->cliente_sis}}','{{$puesto->cliente_secundario}}')" style="background-color:{{$puesto->color}};">{{($puesto->numero)}}</button>
                  @continue(2)
                  @endif
               @endforeach
                <button class="button" onclick="mostrarModal('{{$puesto->numero}}','{{$puesto->cliente_sis}}','{{$puesto->cliente_secundario}}')" style="background-color:{{$puesto->color}};">{{($puesto->numero)}}</button>
              @endif
            @endforeach 
        </div>
        <div id="fila_vacia"></div>
        <div id="fila_2">
            @foreach ($puestoss as $puesto)
             @if(($puesto->numero)>=26&&($puesto->numero)<=50)
               @foreach($clientess as $cliente)
                @if(($puesto->cliente_sis)==($cliente->CodigoSIS))
                  <button class="button" onmouseover="mostrarDialogo('{{$cliente->Nombre}}','{{$cliente->Apellido}}','{{$cliente->Placa}}','{{$cliente->NombreSecundario}}','{{$cliente->ApellidoSecundario}}')"  onmouseout="cerrarDialogo()" onclick="mostrarModal('{{$puesto->numero}}','{{$puesto->cliente_sis}}','{{$puesto->cliente_secundario}}')" style="background-color:{{$puesto->color}};">{{($puesto->numero)}}</button>
                  @continue(2)
                  @endif
               @endforeach
                <button class="button" onclick="mostrarModal('{{$puesto->numero}}','{{$puesto->cliente_sis}}','{{$puesto->cliente_secundario}}')" style="background-color:{{$puesto->color}};">{{($puesto->numero)}}</button>
              @endif
            @endforeach 
        </div>
        <div id="fila_3">
            @foreach ($puestoss as $puesto)
             @if(($puesto->numero)>=51&&($puesto->numero)<=75)
               @foreach($clientess as $cliente)
                @if(($puesto->cliente_sis)==($cliente->CodigoSIS))
                  <button class="button" onmouseover="mostrarDialogo('{{$cliente->Nombre}}','{{$cliente->Apellido}}','{{$cliente->Placa}}','{{$cliente->NombreSecundario}}','{{$cliente->ApellidoSecundario}}')"  onmouseout="cerrarDialogo()" onclick="mostrarModal('{{$puesto->numero}}','{{$puesto->cliente_sis}}','{{$puesto->cliente_secundario}}')" style="background-color:{{$puesto->color}};">{{($puesto->numero)}}</button>
                  @continue(2)
                  @endif
               @endforeach
                <button class="button" onclick="mostrarModal('{{$puesto->numero}}','{{$puesto->cliente_sis}}','{{$puesto->cliente_secundario}}')" style="background-color:{{$puesto->color}};">{{($puesto->numero)}}</button>
              @endif
            @endforeach 
        </div>
        <div id="fila_vacia"></div>
        <div id="fila_4">
            @foreach ($puestoss as $puesto)
             @if(($puesto->numero)>=76&&($puesto->numero)<=100)
               @foreach($clientess as $cliente)
                @if(($puesto->cliente_sis)==($cliente->CodigoSIS))
                  <button class="button" onmouseover="mostrarDialogo('{{$cliente->Nombre}}','{{$cliente->Apellido}}','{{$cliente->Placa}}','{{$cliente->NombreSecundario}}','{{$cliente->ApellidoSecundario}}')"  onmouseout="cerrarDialogo()" onclick="mostrarModal('{{$puesto->numero}}','{{$puesto->cliente_sis}}','{{$puesto->cliente_secundario}}')" style="background-color:{{$puesto->color}};">{{($puesto->numero)}}</button>
                  @continue(2)
                  @endif
               @endforeach
                <button class="button" onclick="mostrarModal('{{$puesto->numero}}','{{$puesto->cliente_sis}}','{{$puesto->cliente_secundario}}')" style="background-color:{{$puesto->color}};">{{($puesto->numero)}}</button>
              @endif
            @endforeach 
        </div>
    </div>

    <div id="miModal" class="modal">
        <div class="modal-contenido">
           <span onclick="cerrarModal()" class="modal-cerrar">&times;</span>
            <h2>Agregar a:</h2>
            <form class="formulario-modal" action="{{url('/asignar2')}}" method="get" >
             <label>Puesto</label>
             <input id="puesto" type="text" name="puesto">
             <label>Codigo SIS Titular:</label>
             <input type="text" name="sis" id="sis"  oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); this.value = this.value.replace(/[^0-9]/,'')" minlength ="9" maxlength ="10" placeholder= "Ingrese CodigoSIS"  required>
             <label>Codigo SIS Secundario:</label>
             <input type="text" name="sis2" id="sis2"  oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); this.value = this.value.replace(/[^0-9]/,'')" minlength ="9" maxlength ="10" placeholder= "Ingrese CodigoSIS"  >
             <label id="">Desde:</label>
             <input type="date" id="inicio" name="inicio" value="{{date('Y-m-d')}}" required></input>
             <input type="submit" name="accion" value="vaciar sitio">
             <input type="submit" name="accion" value="asignar sitio">
          </form>
        </div>
      </div>

      <script>
        function mostrarModal($a,$s,$cs) {
          document.getElementById("miModal").style.display = "block";
          //var contenidoBoton = document.getElementById("puestos").innerHTML;
          document.getElementById("puesto").value = $a;
          document.getElementById("sis").value = $s;
          document.getElementById("sis2").value = $cs;
          //document.getElementById("nombre").innerHTML=$n;
        
        }
        function cerrarModal() {
          document.getElementById("miModal").style.display = "none";
        }
        function vaciarCitio(){
        
        }
        </script>

        <div id="myDialog" >
          <h3>Información</h3>
         <label><b>Nombre: </b></label>
         <label id="nombre"></label>
         <label id="apellido"></label><br>
         <label><b>Placa: </b></label>
         <label id="placa"></label><br>
         <label><b>Compartido con:</b></label>
         <label id="nombres"></label>
         <label id="apellidos"></label>   
      </div>
      
      <script>
      function mostrarDialogo($n,$a,$p,$ns,$as){ 
      var dialog = document.getElementById('myDialog');
       dialog.style.display = 'block';
      document.getElementById("nombre").innerHTML=$n;
      document.getElementById("apellido").innerHTML=$a;
      document.getElementById("placa").innerHTML=$p;
      document.getElementById("nombres").innerHTML=$ns;
      document.getElementById("apellidos").innerHTML=$as;
      }
      function cerrarDialogo(){ 
      var dialog = document.getElementById('myDialog');
       dialog.style.display = 'none';
      }
      
      </script>
</body>
</html>
@endsection