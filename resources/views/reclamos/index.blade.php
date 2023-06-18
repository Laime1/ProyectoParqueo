@extends('layouts.template')

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Quejas y Reclamos</title>
    <link rel="stylesheet" href="{{asset('Style/tablas.css')}}">

</head>
@section('content')

<body>
    <h1>Lista de Quejas y Reclamos</h1>
    
    @if (count($quejas) > 0)
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Codigo SIS</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quejas as $queja)
                    <tr>
                        <td>{{ $queja->Nombre}}</td>
                        <td>{{ $queja->CodigoSIS }}</td>
                        <td>{{ $queja->descripcion }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay quejas o reclamos registrados.</p>
    @endif
    
    <div id="boton-imprimir">
        <button onclick="imprimirReporte()">Imprimir</button>
    </div>
    
<script>
    function imprimirReporte() {
        document.getElementById('boton-imprimir').innerHTML = '';
        window.print();
    }

    window.addEventListener('afterprint', function() {
        document.getElementById('boton-imprimir').innerHTML = '<button onclick="imprimirReporte()">Imprimir</button>';
    });
</script>

       

  
</body>
</html>
@endsection