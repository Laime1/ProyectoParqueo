@extends('layouts.template')

@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Pagos</title>
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <link rel="stylesheet" href="{{ asset('template/estiloPago.css') }}">
</head>
@section('content')
<body>
  <h1>Administración de Control de Pagos Estacionamiento-FCyT</h1>

  <table>
    <tr>
      <th>Codigo SIS</th>
      <th>Fecha de Ingreso</th>
      <th>Sitio Compartido</th>
      <th>Estado de Pago</th>
      <th>Acciones</th>
    </tr>
    <tr>
      <td>2001789</td>
      <td>10/06/2023</td>
      <td>SI</td>
      <td>Pagado</td>
      <td>
        <button class="button">Marcar como Pagado</button>
      </td>
    </tr>
    <tr>
      <td>2002598</td>
      <td>10/06/2023</td>
      <td>SI</td>
      <td>Pendiente</td>
      <td>
        <button class="button">Marcar como Pagado</button>
      </td>
    </tr>
    <tr>
      <td>2001456</td>
      <td>10/06/2023</td>
      <td>NO</td>
      <td>Pagado</td>
      <td>
        <button class="button">Marcar como Pagado</button>
      </td>
    </tr>
    <tr>
      <td>200611</td>
      <td>10/06/2023</td>
      <td>SI</td>
      <td>Pendiente</td>
      <td>
        <button class="button">Marcar como Pagado</button>
      </td>
    </tr>
    <tr>
      <td>200112</td>
      <td>10/06/2023</td>
      <td>NO</td>
      <td>Pendiente</td>
      <td>
        <button class="button">Marcar como Pagado</button>
      </td>
    </tr>
    <tr>
      <td>2001659</td>
      <td>10/06/2023</td>
      <td>NO</td>
      <td>Pendiente</td>
      <td>
        <button class="button">Marcar como Pagado</button>
      </td>
    </tr>
    <tr>
      <td>200987</td>
      <td>10/06/2023</td>
      <td>NO</td>
      <td>Pendiente</td>
      <td>
        <button class="button">Marcar como Pagado</button>
      </td>
    </tr>
    <tr>
      <td>200214</td>
      <td>10/06/2023</td>
      <td>NO</td>
      <td>Pendiente</td>
      <td>
        <button class="button">Marcar como Pagado</button>
      </td>
    </tr>
    <tr>
      <td>200022</td>
      <td>10/06/2023</td>
      <td>NO</td>
      <td>Pendiente</td>
      <td>
        <button class="button">Marcar como Pagado</button>
      </td>
    </tr>
    <!-- Agrega más filas según sea necesario -->
  </table>
</body>
</html>
</html>
@endsection