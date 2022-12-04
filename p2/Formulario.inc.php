<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.12.4-jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<title>Formulario de registro de datos</title>
<style type="text/css">
	.login-form {
		width: 340px;
    	margin: 20px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
  <body background="img/fondo2.jpg">
  <section>
  <div class="login-form">
  <center><h2>REGISTRANDO LOS DATOS</h2></center>
  <div class="form-group">
    <label class="col-sm-6 text-left">Nombre completo</label>
    <div class="col-sm-12">
        <input type="text" name="txt_usuario" class="form-control" placeholder="Ingrese Nombre" />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-6 text-left">Apellidos</label>
        <div class="col-sm-12">
        <input type="text" id="txt_contra" name="txt_contra" class="form-control" placeholder="Ingrese su Apellido" />
        </div>
  </div>
  <div class="form-group">
    <label class="col-sm-6 text-left">Cedula de identidad</label>
        <div class="col-sm-12">
        <input type="number" id="txt_contra" name="txt_contra" class="form-control" placeholder="Ingrese CI" />
        </div>
  </div>
  <div class="form-group">
    <label class="col-sm-6 text-left">Celular</label>
        <div class="col-sm-12">
        <input type="number" id="txt_contra" name="txt_contra" class="form-control" placeholder="Ingrese Nro de Celular" />
        </div>
  </div>
  <div class="form-group">
    <label class="col-sm-6 text-left">Usuario</label>
        <div class="col-sm-12">
        <input type="number" id="txt_contra" name="txt_contra" class="form-control" placeholder="Ingrese su usuario" />
        </div>
  </div>

</div>
  </section>				
	</body>
</html>