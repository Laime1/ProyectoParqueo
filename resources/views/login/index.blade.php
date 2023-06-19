<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('Style/login.css')}}">
    <title>Document</title>
</head>
<body>
@if (session('message'))
    <li>{{session('message')}}</li>
    @endif
<h1>Iniciar sesion</h1>
<form method="POST" action="{{ route('login') }}">
    @csrf
   
    <div>
        <label for="email">Correo electrónico</label>
        <input type="email" name="email" required autofocus>
       
    </div>

    <div>
        <label for="password">Contraseña</label>
        <input type="password" name="password" required autocomplete="current-password">
        
    </div>

    <div>
        <button type="submit">Iniciar sesión</button>
    </div>
</form>





</body>
</html>