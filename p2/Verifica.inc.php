<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>Kardex</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.12.4-jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
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
    td{
        text-align: center;
        background: #C9FFE5;
    }
    #h{
        background: #33CCCC;
    }
    h1{
        color: red;
        text-align:center;
    }
</style>
</head>
	<body>
	<div class="wrapper">
	<div class="container">
		<div class="col-lg-12">
			<center>
				<h1>VERIFICACION DE DOCUMENTOS</h1>	
			</center>
            <hr>
		</div>
		<br>
        <br>
        <br>
		<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h1>Estudiante(s)<h1>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <td id="h">Nombre(s)</td>
                                            <td id="h">Apellidos(s)</td>
                                            <td id="h">Usuario</td>
                                            <td id="h">Ci</td>
                                            <td id="h">Celular</td>
                                            <td id="h">Estado</td>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									include "conexion.php";
                                    session_start();
                                    $usuario=$_SESSION["usuario"];
                                    $sql="select * from academico.Alumno ";
                                    //and fechafin is null
                                    $resultado=mysqli_query($con, $sql);
										
                                    ?>
                                    <?php 
                                        while ($fila=mysqli_fetch_array($resultado))
                                        {
                                            ?>
                                                <tr>
                                                    <td><?php echo $fila["nombre"]?></td>
                                                    <td><?php echo $fila["apellido"]?></td>
                                                    <td><?php echo $fila["usuario"]?></td>
                                                    <td><?php echo $fila["ci"]?></td>
                                                    <td><?php echo $fila["celular"]?></td>
                                                    <td><a href='flujo.php?flujo=<?php echo $fila["Flujo"]?>&proceso=P4&rol=""'><button class="btn btn-primary">Revisar</td>;
                                                </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
	</div>
	</div>							
	</body>
</html>