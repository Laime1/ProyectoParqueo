<!-- Reporte de pagos mensuales -->
@extends('layouts.template')
@section('content')
<link rel="stylesheet" href="{{asset('Style/tablas.css')}}">

<h1>Reporte de pagos mensuales</h1>
<table>
  <thead>
    <tr>
      <th>Año</th>
      <th>Mes</th>
      <th>Total</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($pagosMensuales as $pago)
    <tr>
      <td>{{ $pago->anio }}</td>
      <td>{{ $pago->mes }}</td>
      <td>{{ $pago->total }}</td>
    </tr>
    @endforeach
  </tbody>
</table>

<!-- Reporte de pagos anuales -->
<h1>Reporte de pagos anuales</h1>
<table>
  <thead>
    <tr>
      <th>Año</th>
      <th>Total</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($pagosAnuales as $pago)
    <tr>
      <td>{{ $pago->anio }}</td>
      <td>{{ $pago->total }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection