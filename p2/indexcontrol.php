<?php
$usuario=$_GET["usuario"];
$password=$_GET["password"];
include "conexion.php";
$sql = "Select xr.descripcion as Rol
        From Usuario xu, Rol xr, rolusuario xru
        Where xu.Id = xru.IdUsuario AND
		xr.Id = xru.Id AND
		xu.contrasenia = '$password' AND
		xu.descripcion = '$usuario'";
$resultado=mysqli_query($con, $sql);
$fila=mysqli_fetch_array($resultado);

echo $fila['Rol'];
if ($fila['Rol']=='Estudiante')
{
	session_start();
	$_SESSION["usuario"]=$usuario;
	$_SESSION["rol"]='Estudiante';
	echo "2";
	header("Location: EntradaEstudiante.php");
	exit;
}
if ($fila['Rol']=='Kardex')
{
	session_start();
	$_SESSION["usuario"]=$usuario;
	$_SESSION["rol"]='Kardex';
	header("Location: EntradaKardex.php");
	exit;
}
header("Location: index.php?rol=$rol");
?>
