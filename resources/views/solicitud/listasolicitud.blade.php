@extends('layouts.template')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('Style/listaSol.css')}}">
    <title>Solicitudes</title>
</head>
@section('content')
<body>
<div class="container">
<h1>Lista de solicitudes</h1>
    
    @if (count($solicitudes) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Codigo SIS</th>
                    <th>Descripción</th>
                    <th>Fecha y hora</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($solicitudes as $sol)
                    <tr>
                        <td>{{ $sol->nombre}}</td>
                        <td>{{ $sol->apellido}}</td>
                        <td>{{ $sol->codigo_sis }}</td>
                        <td>{{ $sol->descripcion }}</td>
                        <td>{{ $sol->fecha_hora }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay solicitudes registrados.</p>
    @endif
</div>
</body>
</html>
@endsection