@extends('layouts.template')
<!DOCTYPE html>
<html>
<head>
    <title>Crear Queja o Reclamo</title>
    <link rel="stylesheet" href="{{asset('Style/solicitud.css')}}">

</head>
@section('content')

<body>
    <h1 class="titulo"> Queja o Reclamo</h1>
    @if (session('success'))
    <li>{{session('success')}}</li>
    @endif
    <form method="POST" action="{{ route('quejas.store') }}">
        @csrf
        
        <label for="nombre">Nombre:</label>
        <input type="text" name="sis" id="sis"  oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); this.value = this.value.replace(/[^0-9]/,'')" minlength ="9" maxlength ="10" placeholder= "Ingrese CodigoSIS"  required>

        
        <label for="descripcion">Descripción:</label><br>
        <textarea name="descripcion" id="descripcion" rows="5" required></textarea><br>

        
        
        <input type="submit" value="Enviar Queja o Reclamo">
    </form>
</body>
</html>
@endsection