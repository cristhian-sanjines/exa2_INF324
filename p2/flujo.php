<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.12.4-jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<?php
	$flujo = $_GET["flujo"];
	$proceso = $_GET["proceso"];
	include "conexion.php";
	$sql="select * from flujoproceso where Flujo='$flujo' and Proceso = '$proceso'";
	$resultado=mysqli_query($con, $sql);
	$fila=mysqli_fetch_array($resultado);
	$pantalla=$fila["Pantalla"];
	$tipo=$fila["Tipo"];
	$roles = $_GET["rol"];
	echo $roles;
	include $pantalla.".datos.inc.php";
?>
<form method="GET" action="motor.php">
	<?php 
		include $pantalla.".inc.php";
	?>
	<input type="hidden" value="<?php echo $pantalla;?>" name="pantalla"/>
	<input type="hidden" value="<?php echo $flujo;?>" name="flujo"/>
	<input type="hidden" value="<?php echo $proceso;?>" name="proceso"/>
	<input type="hidden" value="<?php echo $tipo;?>" name="tipo"/>
	<br/>
	<?php
		if ($tipo=="C")
		{
			?>
			<center>
				<input type="submit" value="Si" class="btn btn-success" name="Si"/>
				<input type="submit" value="No" class="btn btn-danger" name="No"/>
			</center>
			<?php
		}
		else
		{
			if($proceso=="-" ){
				if($roles=="Kardex"){
					header("Location: EntradaKardex.php");
				}
				else{
					header("Location: EntradaEstudiante.php");
				}
			}else{
				?>
				<center>
					<input type="submit" value="Anterior" class="btn btn-primary" name="Anterior"/>
					<input type="submit" value="Siguiente" class="btn btn-success" name="Siguiente"/>
				</center>
				<?php
			}
		}
	?>
</form>
