<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>KARDEX</title>
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
</style>
</head>
	<body>
	<div class="wrapper">
	<div class="container">
		<div class="col-lg-12">
			<center>
				<h1>Pagina De Seguimiento</h1>	
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
                          <?php session_start(); ?>
                           <h1> Benvenido <?php echo $_SESSION["usuario"];?><h1>
                            <hr>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <td>Flujo</td>
                                            <td>proceso</td>
                                            <td>Usuario</td>
                                            <td>fecha inicial</td>
                                            <td>fecha final</td>
                                            <td>Resultado</td>
                                            <td>Ir</td>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									include "conexion.php";
                                    $usuario=$_SESSION["usuario"];
                                    $sql="SELECT * 
                                          from flujoprocesoseguimiento 
                                          WHERE usuario='$usuario'";
                                    //and fechafin is null
                                    $resultado=mysqli_query($con, $sql);
                                    ?>
                                    <?php 
                                        while ($fila=mysqli_fetch_array($resultado))
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $fila["Flujo"]?></td>
                                                <td><?php echo $fila["Proceso"]?></td>
                                                <td><?php echo $fila["Usuario"]?></td>
                                                <td><?php echo $fila["FechaInicio"]?></td>
                                                <td><?php echo $fila["FechaFin"]?></td>
                                                <td><?php echo $fila["rechazo"]?></td>
                                                <td><a href='flujo.php?flujo=<?php echo $fila["Flujo"]?>&proceso=P1&rol=""'><button class="btn btn-primary">Revisar</td>;
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
    <a href="cerrar_sesion.php"><button class="btn btn-success text-left"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cerrar Sesion</button></a>
	</div>								
	</body>
</html>