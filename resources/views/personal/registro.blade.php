@extends('layouts.template')


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registrar personal</title>
    <title>Registro Personal</title>
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <link rel="stylesheet" href="{{ asset('template/estilosR.css') }}">
</head>
@section('content')
<body>
<div class="boton">
    <a href="{{url('/personal')}}" class="btn btn-primary">Ver lista del personal</a>
  </div>
    <div class="container h-100">
      <div class="d-flex justify-content-center h-100 mt-5" >
        <div class="user_card">
          <div class="d-flex justify-content-center">
            <div class="brand_logo_container mt-2">
              <img src="https://www.redacademica.edu.co/sites/default/files/2021-12/list-ged1d381c2_1280_0_1.png" class="brand_logo" alt="Logo">
            </div>
            <div class="d-flex justify-content-center form_container " >
                <form action="{{url('/personals')}}" method="post">
                    @csrf
                    <label>Nombre:<span class="text-danger">*</span></label>
                    <div class="input-group mb-1">
                        <div class="input-group-append">
                          <span class="input-group-text"><i class=""></i></span>
                        </div>
                        <input type="text" name="nombrepersonal" class="form-control input_user" value="" placeholder= "Ingrese nombre"  
                          oninput="this.value = this.value.replace(/[^\a-\z\A-\Z\ñ\Ñ ]/g,'')"  minlength ="3" maxlength ="30" required>
                    </div>
                    <label>Apellido:<span class="text-danger">*</span></label>
                    <div class="input-group mb-1">
                        <div class="input-group-append">
                          <span class="input-group-text"><i class=""></i></span>
                        </div>
                        <input type="text" name="apellidopersonal" class="form-control input_user" value="" placeholder= "Ingrese nombre"  
                          oninput="this.value = this.value.replace(/[^\a-\z\A-\Z\ñ\Ñ ]/g,'')"  minlength ="3" maxlength ="30" required>
                    </div>
                    <label >Codigo Sis:<span class="text-danger">*</span></label>
                    <div class="input-group mb-1">
                        <div class="input-group-append">
                          <span class="input-group-text"><i class=""></i></span>
                        </div>
                        <input type="text" name="codigosispersonal" class="form-control input_user" value="" placeholder="Ingrese codigo sis"
                        oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); this.value = this.value.replace(/[^0-9]/,'')" minlength ="9" maxlength ="10"  required>
                    </div>
                    <label >Telefono/Celular:</label><br>
                    <div class="input-group mb-1">
                        <div class="input-group-append">
                          <span class="input-group-text"><i class=""></i></span>
                        </div>
                        <input type="text" name="telefonopersonal" class="form-control input_user" value="" placeholder="Ingrese numero telef/cel"
                        oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); this.value = this.value.replace(/[^0-9]/,'')" minlength ="7" maxlength ="8" min="40000000" max="79999999" required>
                    </div> 
                    <label >Correo Electronico:<span class="text-danger">*</span></label><br>
                    <div class="input-group mb-1">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class=""></i></span>
                        </div>
                        <input type="text" name="email" class="form-control input_user" value="" placeholder= "ej: gpmcheco@mail.com" required maxlength="50">
                    </div>
                    <label>Cargo:<span class="text-danger">*</span></label>
                    <div class="input-group mb-1">
                        <div class="input-group-append">
                          <span class="input-group-text"><i class=""></i></span>
                        </div>
                        <input type="text" name="cargopersonal" class="form-control input_user" value="" placeholder= "Ingrese cargo"  
                          oninput="this.value = this.value.replace(/[^\a-\z\A-\Z\ñ\Ñ ]/g,'')"  minlength ="3" maxlength ="30" required>
                    </div>
                    <label>Turno:<span class="text-danger">*</span></label>
                    <div class="input-group mb-1">
                        <div class="input-group-append">
                          <span class="input-group-text"><i class=""></i></span>
                        </div>
                        <input type="text" name="turnopersonal" class="form-control input_user" value="" placeholder= "Ingrese el turno"  
                          oninput="this.value = this.value.replace(/[^\a-\z\A-\Z\ñ\Ñ ]/g,'')"  minlength ="3" maxlength ="30" required>
                    </div>
                   
                    <div><p class="text-muted mb-2">(*)campos obligatorios</p></div>
                    <div class="row mt-2">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                                <button type="submit_name" class="btn save_btn">Guardar</button>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                                <a href="" class="btn save_btn">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
</body>
</html>
@endsection