<!DOCTYPE html>
<html>
<head>
    <title>Lista de Quejas y Reclamos</title>
</head>
<body>
    <h1>Lista de Quejas y Reclamos</h1>
    
    @if (count($quejas) > 0)
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quejas as $queja)
                    <tr>
                        <td>{{ $queja->nombre }}</td>
                        <td>{{ $queja->descripcion }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay quejas o reclamos registrados.</p>
    @endif
</body>
</html>
